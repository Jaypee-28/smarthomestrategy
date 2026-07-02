<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f4f4f4; }
        .success { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Automated Pitch Batch Report</h2>
    <p>The scheduled automation just ran successfully on {{ now()->timezone('America/New_York')->format('l, F j, Y \a\t g:i A') }} EST.</p>
    
    <p><span class="success">{{ count($sentEmails) }}</span> emails were sent in this batch.</p>

    @if(count($sentEmails) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Company</th>
                <th>Contact Name</th>
                <th>Email</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sentEmails as $email)
            <tr>
                <td>{{ $email['company'] }}</td>
                <td>{{ $email['name'] }}</td>
                <td>{{ $email['email'] }}</td>
                <td>
                    @if($email['type'] === 'Initial')
                        <span style="color: blue;">Initial Pitch</span>
                    @elseif($email['type'] === 'FollowUp1')
                        <span style="color: orange;">Follow Up 1</span>
                    @elseif($email['type'] === 'FollowUp2')
                        <span style="color: purple;">Follow Up 2</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    
    <p style="margin-top: 30px; font-size: 12px; color: #666;">
        Sent automatically by SmartHomeStrategy CRM.
    </p>
</body>
</html>
