<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrustLab Support Inquiry Reply</title>
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
            margin-bottom: 5px;
        }
        .header h1 {
            color: #ffffff;
            margin: 10px 0 0 0;
            font-size: 20px;
            font-weight: 700;
        }
        .content {
            padding: 40px;
        }
        .reply-box {
            background-color: #f3f4f6;
            border-radius: 12px;
            padding: 24px;
            margin: 25px 0;
            border-left: 4px solid #3b82f6;
            font-size: 15px;
            color: #1f2937;
        }
        .footer {
            padding: 30px 40px;
            background-color: #f9fafb;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }
        .original-message {
            margin-top: 40px;
            padding-top: 24px;
            border-top: 1px dashed #e5e7eb;
            font-size: 13px;
            color: #9ca3af;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ url('/images/logo/logo-outlined.png') }}" alt="TrustLab Logo">
            <h1>Support Reply</h1>
        </div>
        <div class="content">
            <p>Hello {{ $inquiry->name }},</p>
            
            <p>Thank you for contacting TrustLab. Our team has reviewed your inquiry and has the following response:</p>

            <div class="reply-box">
                {!! nl2br(e($replyMessage)) !!}
            </div>

            <p>Best regards,<br><strong>The TrustLab Team</strong></p>

            <div class="original-message">
                <p><strong>Original Message:</strong></p>
                <p><em>{{ $inquiry->message }}</em></p>
            </div>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} TrustLab. All rights reserved.</p>
            <p>This is an automated system message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
