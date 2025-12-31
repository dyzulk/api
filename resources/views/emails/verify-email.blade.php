<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrustLab Email Verification</title>
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
            background-color: #111827;
            text-align: center;
        }
        .header img {
            height: 32px;
            margin-bottom: 15px;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .content {
            padding: 40px;
            text-align: center;
        }
        .title {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 20px;
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
            padding: 12px 32px;
            background-color: #465fff;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            margin: 25px 0;
        }
        .sub-link {
            font-size: 12px;
            color: #9ca3af;
            word-break: break-all;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #f3f4f6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ url('/images/logo/logo-outlined.png') }}" alt="TrustLab Logo">
            <h1>Email Verification</h1>
        </div>
        <div class="content">
            <p>Hello {{ $name }},</p>
            
            <p>Thank you for joining TrustLab! Before you can start managing your certificates and API keys, we need you to verify your email address.</p>

            <a href="{{ $url }}" class="button">Verify Email Address</a>

            <p>If you did not create an account, no further action is required.</p>

            <div class="sub-link">
                <p>If you're having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser:</p>
                <p>{{ $url }}</p>
            </div>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} TrustLab. All rights reserved.</p>
            <p>This is an automated system message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
