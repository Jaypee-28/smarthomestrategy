<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prospect;
use Illuminate\Http\Request;

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
            
            'D' => "We are the owners of SmartHomeStrategy.com and are initiating a private sale. We specifically flagged your company because an AI-driven operating system needs a category-defining domain to build enterprise trust.\n\nAre you the right person to speak with about acquiring strategic assets, or is there a VP of Growth I should ping?"
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
}
