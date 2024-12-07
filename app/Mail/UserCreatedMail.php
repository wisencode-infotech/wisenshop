<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

     /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $template = EmailTemplate::where('locale', app()->getLocale())->where('name', 'user_created')->first();

        if(empty($template)){
            $template = EmailTemplate::where('locale', 'en')->where('name', 'user_created')->first();
        }

        $subject = $template ? $template->subject : 'Welcome';

        $dynamicSubject = str_replace(['{{ app_name }}'],[config('app.name')],$subject);

        return new Envelope(
            subject: $dynamicSubject,
        );
        
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $template = EmailTemplate::where('locale', app()->getLocale())->where('name', 'user_created')->first();

        if(empty($template)){
            $template = EmailTemplate::where('locale', 'en')->where('name', 'user_created')->first();
        }
        
        $body = $template ? $template->body_html : '';

        $dynamicBody = str_replace(
            ['{{ user_name }}', '{{ app_name }}', '{{ support_email }}'],
            [
                $this->user->name,
                config('app.name'),
                __setting('email') ?? 'No Email Avaialble',
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
