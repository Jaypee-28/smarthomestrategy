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
        $templates = [
            'A' => "We are the owners of the premium digital asset SmartHomeStrategy.com and are quietly initiating private acquisition discussions. Given your recent capital influx and push to dominate the sector, securing this asset gives you an immediate, defensible moat in the space.\n\nAre you handling M&A and brand assets right now, or should I speak with your CMO?",
            
            'B' => "I’m reaching out because my team is preparing to privately sell the asset SmartHomeStrategy.com. We identified your company as a prime acquisition partner because owning this asset positions you as the definitive authority to real estate developers deciding on their tech stack.\n\nIs acquiring strategic digital real estate on your roadmap for this quarter?",
            
            'C' => "As your company continues to expand its hardware ecosystem, controlling the high-level narrative is critical. We are the owners of SmartHomeStrategy.com and are looking for the right organization to acquire the domain and asset.\n\nIt’s a perfect fit to launch a consulting arm, partner network, or enterprise offering.\n\nAre you open to a brief chat about acquiring this?",
            
            'D' => "We are the owners of SmartHomeStrategy.com and are initiating a private sale. We specifically flagged your company because an AI-driven operating system needs a category-defining domain to build enterprise trust.\n\nAre you the right person to speak with about acquiring strategic assets, or is there a VP of Growth I should ping?",

            'FollowUp1' => "Just floating this to the top of your inbox.\n\nAre you the right person to speak with regarding digital asset acquisitions, or is there someone else on your team handling M&A that I should be speaking to?",

            'FollowUp2' => "I haven't heard back, so I'll assume acquiring new strategic assets isn't a priority for your team this quarter.\n\nWe are opening discussions with other players in the space this week. If things change on your end, let me know."
        ];

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
