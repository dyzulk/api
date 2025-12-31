<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Expired Alert</title>
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
            background-color: #fef2f2;
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
            color: #991b1b;
            margin-bottom: 20px;
        }
        .details {
            background-color: #fef2f2;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            border: 1px solid #fee2e2;
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
            background-color: #dc2626;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ url('/images/logo/logo-outlined.png') }}" alt="TrustLab Logo">
        </div>
        <div class="content">
            <h1 class="title">URGENT: Certificate Has Expired</h1>
            
            <p>Hello {{ $certificate->user->first_name ?? 'User' }},</p>
            
            <p>This is a critical notification that your SSL certificate has <strong>ALREADY EXPIRED</strong>.</p>
            
            <div class="details">
                <p><strong>Common Name:</strong> {{ $certificate->common_name }}</p>
                <p><strong>Organization:</strong> {{ $certificate->organization }}</p>
                <p><strong>Key Strength:</strong> {{ $certificate->key_bits }}-bit</p>
                <p><strong>Expired On:</strong> {{ $certificate->valid_to->format('d M Y H:i:s') }}</p>
            </div>
            
            <p>Your services using this certificate may be inaccessible or showing security warnings. Please renew immediately.</p>
            
            <a href="{{ config('app.frontend_url', 'http://localhost:3000') }}/dashboard" class="button">Renew Now</a>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} TrustLab. All rights reserved.</p>
            <p>This is an automated system message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
