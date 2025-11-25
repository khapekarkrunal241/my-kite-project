<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactEnquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiryData;

    /**
     * Create a new message instance.
     */
    public function __construct($enquiryData)
    {
        $this->enquiryData = $enquiryData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Enquiry - KRK Kite Hub - ' . $this->enquiryData['subject'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-enquiry',
            with: [
                'name' => $this->enquiryData['name'],
                'email' => $this->enquiryData['email'],
                'phone' => $this->enquiryData['phone'],
                'subject' => $this->enquiryData['subject'],
                'message' => $this->enquiryData['message'],
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}