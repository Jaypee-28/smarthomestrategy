<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcquisitionRequest;
use App\Models\AcquisitionInquiry;
use App\Mail\AcquisitionAdminNotification;
use App\Mail\AcquisitionUserAcknowledgment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AcquisitionController extends Controller
{
    /**
     * Display the acquisition inquiry form.
     */
    public function show()
    {
        return view('acquisition.index');
    }

    /**
     * Store a newly created inquiry in storage and send emails.
     */
    public function store(StoreAcquisitionRequest $request)
    {
        $validated = $request->validated();
        
        // Add IP and User Agent
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->userAgent();

        // Store inquiry
        $inquiry = AcquisitionInquiry::create($validated);

        // Send Emails (Wrapping in try/catch to avoid breaking user flow if mail fails)
        try {
            Mail::to('maxwell@smarthomestrategy.com')->send(new AcquisitionAdminNotification($inquiry));
            Mail::to($inquiry->email)->send(new AcquisitionUserAcknowledgment());
        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());
        }

        return redirect()->route('acquisition.success');
    }

    /**
     * Display the success page.
     */
    public function success()
    {
        return view('acquisition.success');
    }
}
