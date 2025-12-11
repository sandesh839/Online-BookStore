<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .email-container {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
        }
        .email-header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px 5px 0 0;
            margin: -20px -20px 20px -20px;
        }
        .email-header h2 {
            margin: 0;
        }
        .info-row {
            margin: 15px 0;
            padding: 10px;
            background-color: white;
            border-left: 4px solid #4CAF50;
        }
        .info-label {
            font-weight: bold;
            color: #555;
        }
        .message-content {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
            white-space: pre-wrap;
        }
        .footer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>📧 New Contact Form Submission</h2>
        </div>

        <div class="info-row">
            <span class="info-label">From:</span> {{ $name }}
        </div>

        <div class="info-row">
            <span class="info-label">Email:</span> <a href="mailto:{{ $email }}">{{ $email }}</a>
        </div>

        <div class="info-row">
            <span class="info-label">Date:</span> {{ date('F d, Y - h:i A') }}
        </div>

        <h3>Message:</h3>
        <div class="message-content">
{{ $messageContent }}
        </div>

        <div class="footer">
            <p>This email was sent from your e-commerce website contact form.</p>
            <p>You can reply directly to this email to respond to {{ $name }}.</p>
        </div>
    </div>
</body>
</html>
