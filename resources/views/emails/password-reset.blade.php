<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
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
            background-color: #eff6ff;
            text-align: center;
        }
        .header img {
            height: 32px;
            margin-bottom: 15px;
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
            background-color: #3b82f6;
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
        </div>
        <div class="content">
            <h1 class="title">Reset Your Password</h1>
            
            <p>Hello {{ $name }},</p>
            
            <p>You are receiving this email because we received a password reset request for your TrustLab account.</p>

            <a href="{{ $url }}" class="button">Reset Password</a>

            <p>This password reset link will expire in 60 minutes.</p>
            <p>If you did not request a password reset, no further action is required.</p>

            <div class="sub-link">
                <p>If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</p>
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
