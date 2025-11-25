<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Show contact page
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Handle contact form submission
     */
    public function submit(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'terms' => 'required|accepted'
        ]);

        try {
            // Send email to yourself
            $toEmail = 'khapekar1krunal@gmail.com';
            $subject = 'New Enquiry - KRK Kite Hub - ' . $validated['subject'];
            
            $emailContent = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; text-align: center; }
                    .content { background: #f8f9fa; padding: 20px; }
                    .details { background: white; padding: 15px; border-radius: 8px; margin: 15px 0; }
                    .footer { text-align: center; padding: 15px; color: #666; font-size: 12px; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h1>🪁 KRK Kite Hub</h1>
                        <p>New Customer Enquiry Received</p>
                    </div>
                    
                    <div class='content'>
                        <h2>Enquiry Details</h2>
                        
                        <div class='details'>
                            <table width='100%' style='border-collapse: collapse;'>
                                <tr>
                                    <td width='30%' style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Name:</strong></td>
                                    <td style='padding: 8px; border-bottom: 1px solid #eee;'>{$validated['name']}</td>
                                </tr>
                                <tr>
                                    <td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Email:</strong></td>
                                    <td style='padding: 8px; border-bottom: 1px solid #eee;'>{$validated['email']}</td>
                                </tr>
                                <tr>
                                    <td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Phone:</strong></td>
                                    <td style='padding: 8px; border-bottom: 1px solid #eee;'>{$validated['phone']}</td>
                                </tr>
                                <tr>
                                    <td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Subject:</strong></td>
                                    <td style='padding: 8px; border-bottom: 1px solid #eee;'>{$validated['subject']}</td>
                                </tr>
                                <tr>
                                    <td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Message:</strong></td>
                                    <td style='padding: 8px; border-bottom: 1px solid #eee;'>{$validated['message']}</td>
                                </tr>
                                <tr>
                                    <td style='padding: 8px;'><strong>Received At:</strong></td>
                                    <td style='padding: 8px;'>" . now()->format('d M Y, h:i A') . "</td>
                                </tr>
                            </table>
                        </div>
                        
                        <p><strong>Action Required:</strong> Please respond to this enquiry within 24 hours.</p>
                    </div>
                    
                    <div class='footer'>
                        <p>This email was sent from your website contact form.</p>
                        <p>KRK Kite Hub &copy; " . date('Y') . ". All rights reserved.</p>
                    </div>
                </div>
            </body>
            </html>
            ";

            // Send email using Laravel Mail
            Mail::send([], [], function ($message) use ($toEmail, $subject, $emailContent, $validated) {
                $message->to($toEmail)
                        ->subject($subject)
                        ->html($emailContent)
                        ->from('noreply@krkkitehub.com', 'KRK Kite Hub Website');
            });

            return redirect()->route('contact')->with('success', 
                'Thank you for your enquiry, ' . $validated['name'] . '! We have received your message and will get back to you within 24 hours.'
            );

        } catch (\Exception $e) {
            // Log the error
            Log::error('Contact form error: ' . $e->getMessage());
            
            return redirect()->route('contact')->with('error', 
                'Sorry, there was an error sending your message. Please try again or contact us directly at +91 99750 03226. Error: ' . $e->getMessage()
            );
        }
    }
}