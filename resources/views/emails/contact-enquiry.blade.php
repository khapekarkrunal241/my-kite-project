<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Enquiry - KRK Kite Hub</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; }
        .content { background: #f8f9fa; padding: 30px; }
        .details { background: white; padding: 20px; border-radius: 10px; margin: 20px 0; }
        .footer { text-align: center; padding: 20px; color: #666; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🪁 KRK Kite Hub</h1>
            <p>New Customer Enquiry Received</p>
        </div>
        
        <div class="content">
            <h2>Enquiry Details</h2>
            
            <div class="details">
                <table width="100%">
                    <tr>
                        <td width="30%"><strong>Name:</strong></td>
                        <td>{{ $name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{ $email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone:</strong></td>
                        <td>{{ $phone }}</td>
                    </tr>
                    <tr>
                        <td><strong>Subject:</strong></td>
                        <td>{{ $subject }}</td>
                    </tr>
                    <tr>
                        <td><strong>Message:</strong></td>
                        <td>{{ $message }}</td>
                    </tr>
                    <tr>
                        <td><strong>Received At:</strong></td>
                        <td>{{ now()->format('d M Y, h:i A') }}</td>
                    </tr>
                </table>
            </div>
            
            <p><strong>Action Required:</strong> Please respond to this enquiry within 24 hours.</p>
        </div>
        
        <div class="footer">
            <p>This email was sent from your website contact form.</p>
            <p>KRK Kite Hub &copy; {{ date('Y') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>