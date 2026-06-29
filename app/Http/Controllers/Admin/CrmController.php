<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OutboundPitch;

class CrmController extends Controller
{
    public function index()
    {
        $prospects = Prospect::orderBy('id', 'asc')->get();

        // Pass templates so we can populate them dynamically via Alpine
        $templatesFromDb = \App\Models\PitchTemplate::all();
        $templates = [];
        foreach ($templatesFromDb as $template) {
            $templates[$template->key] = [
                'subject' => $template->subject,
                'body' => $template->body,
            ];
        }

        return view('admin.dashboard', compact('prospects', 'templates'));
    }

    public function updateStatus(Request $request, Prospect $prospect)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:Not Contacted,Sent,Follow Up,Replied,Dead'
        ]);

        $prospect->update(['status' => $validated['status']]);

        return response()->json(['success' => true]);
    }

    public function logFollowUp(Request $request, Prospect $prospect)
    {
        $prospect->increment('follow_up_count');
        $prospect->update([
            'last_contacted_at' => now(),
            'status' => 'Follow Up'
        ]);

        return response()->json([
            'success' => true,
            'follow_up_count' => $prospect->follow_up_count,
            'last_contacted_at' => $prospect->last_contacted_at->diffForHumans()
        ]);
    }

    public function sendEmail(Request $request, Prospect $prospect)
    {
        $validated = $request->validate([
            'subject' => 'required|string',
            'body' => 'required|string',
            'type' => 'required|string|in:Initial,FollowUp1,FollowUp2'
        ]);

        // Send the email via SMTP
        Mail::to($prospect->email)->send(new OutboundPitch($validated['subject'], $validated['body']));

        // Automatically update CRM state based on what was sent
        if ($validated['type'] === 'Initial') {
            $prospect->update(['status' => 'Sent', 'last_contacted_at' => now()]);
        } else {
            $prospect->increment('follow_up_count');
            $prospect->update([
                'last_contacted_at' => now(),
                'status' => 'Follow Up'
            ]);
        }

        return response()->json(['success' => true]);
    }
}
