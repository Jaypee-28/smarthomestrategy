<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-w-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #0f172a; padding: 20px; text-align: center; color: white; border-radius: 8px 8px 0 0; }
        .content { background-color: #f8fafc; padding: 30px; border: 1px solid #e2e8f0; border-radius: 0 0 8px 8px; }
        .label { font-weight: 600; color: #475569; font-size: 14px; text-transform: uppercase; margin-top: 15px; margin-bottom: 5px; }
        .value { background-color: white; padding: 10px 15px; border-radius: 4px; border: 1px solid #cbd5e1; margin-bottom: 10px; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #64748b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="margin: 0; color: #fff;">SmartHomeStrategy.com</h2>
            <p style="margin: 5px 0 0; color: #38bdf8;">New Acquisition Inquiry</p>
        </div>
        <div class="content">
            <div class="label">Full Name</div>
            <div class="value">{{ $inquiry->full_name }}</div>

            <div class="label">Email Address</div>
            <div class="value"><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></div>

            <div class="label">Organization</div>
            <div class="value">{{ $inquiry->organization ?: 'N/A' }}</div>

            <div class="label">Job Title</div>
            <div class="value">{{ $inquiry->job_title ?: 'N/A' }}</div>

            <div class="label">Country</div>
            <div class="value">{{ $inquiry->country }}</div>

            <div class="label">Website</div>
            <div class="value">{{ $inquiry->website ?: 'N/A' }}</div>

            <div class="label">Estimated Budget</div>
            <div class="value">{{ $inquiry->budget_range }}</div>

            <div class="label">Message</div>
            <div class="value" style="white-space: pre-wrap;">{{ $inquiry->message }}</div>
            
            <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 25px 0;" />
            
            <div class="label">System Info</div>
            <div style="font-size: 12px; color: #64748b;">
                IP Address: {{ $inquiry->ip_address }}<br>
                Submitted: {{ $inquiry->created_at->format('Y-m-d H:i:s T') }}
            </div>
        </div>
        <div class="footer">
            Automated notification from SmartHomeStrategy.com Acquisition Portal
        </div>
    </div>
</body>
</html>
