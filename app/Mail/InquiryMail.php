<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiryData;

    /**
     * Create a new message instance.
     */
    public function __construct($inquiryData)
    {
        // Decode JSON data into an associative array
        $this->inquiryData = json_decode($inquiryData, true);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // return new Envelope(
        //     subject: 'New Contact Inquiry',
        // );

        $template = EmailTemplate::where('locale', app()->getLocale())->where('name', 'inquiry_received')->first();

        if(empty($template)){
            $template = EmailTemplate::where('locale', 'en')->where('name', 'inquiry_received')->first();
        }

        $subject = $template ? $template->subject : 'New Contact Inquiry';

        return new Envelope(
            subject: $subject,
        );
        
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // return new Content(
        //     markdown: 'emails.inquiry',
        //     with: ['inquiry' => $this->inquiryData]
        // );

        $template = EmailTemplate::where('locale', app()->getLocale())->where('name', 'inquiry_received')->first();

        if(empty($template)){
            $template = EmailTemplate::where('locale', 'en')->where('name', 'inquiry_received')->first();
        }
        
        $body = $template ? $template->body_html : 'Default email body';

        // Replace placeholders dynamically
        $dynamicBody = str_replace(
            ['{{ name }}', '{{ subject }}', '{{ email }}', '{{ description }}'],
            [
                $this->inquiryData['name'],
                $this->inquiryData['subject'],
                $this->inquiryData['email'],
                $this->inquiryData['description']
            ],
            $body
        );

        // Pass the dynamic body to the email view
        return new Content(
            markdown: 'emails.dynamic',
            with: ['content' => $dynamicBody]
        );
    }
}
