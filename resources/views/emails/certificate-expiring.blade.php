<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Expiration Alert</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.5;
            color: #374151;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .header {
            padding: 30px 40px;
            background-color: #fffbeb;
            text-align: center;
        }
        .header img {
            height: 32px;
            margin-bottom: 15px;
        }
        .content {
            padding: 40px;
        }
        .title {
            font-size: 24px;
            font-weight: 700;
            color: #92400e;
            margin-bottom: 20px;
        }
        .details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            border: 1px solid #e5e7eb;
        }
        .details p {
            margin: 5px 0;
            font-size: 14px;
        }
        .footer {
            padding: 30px 40px;
            background-color: #f9fafb;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #3b82f6;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin-top: 10px;
        }
        .note {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ url('/images/logo/logo-outlined.png') }}" alt="TrustLab Logo">
        </div>
        <div class="content">
            <h1 class="title">Action Required: Certificate Expiring Soon</h1>
            
            <p>Hello {{ $certificate->user->first_name ?? 'User' }},</p>
            
            <p>This is a notification that one of your SSL certificates is expiring in <strong>{{ $daysRemaining }} days</strong>.</p>
            
            <div class="details">
                <p><strong>Common Name:</strong> {{ $certificate->common_name }}</p>
                <p><strong>Organization:</strong> {{ $certificate->organization }}</p>
                <p><strong>Key Strength:</strong> {{ $certificate->key_bits }}-bit</p>
                <p><strong>Expiration Date:</strong> {{ $certificate->valid_to->format('d M Y H:i:s') }}</p>
            </div>
            
            <p>Please log in to your dashboard to renew this certificate before it expires to ensure uninterrupted service.</p>
            
            <a href="{{ config('app.frontend_url', 'http://localhost:3000') }}/dashboard" class="button">Go to Dashboard</a>
            
            <p class="note">
                If you have already renewed this certificate, please ignore this message.<br>
                You are receiving this email because you have enabled certificate renewal alerts in your account settings.
            </p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} TrustLab. All rights reserved.</p>
            <p>This is an automated system message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
