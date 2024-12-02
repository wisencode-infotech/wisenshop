<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        $template = EmailTemplate::where('locale', app()->getLocale())
                                 ->where('name', 'order_placed')
                                 ->first();

        if (empty($template)) {
            $template = EmailTemplate::where('locale', 'en')
                                     ->where('name', 'order_placed')
                                     ->first();
        }

        $subject = $template->subject ?? __trans('Your Order Has Been Placed');
        $subject = __setting('site_title') ? __setting('site_title') . ' - ' . $subject : $subject;

        return new Envelope(
            subject: $subject,
        );

        // $subject = __trans('Your Order Has Been Placed');
        
        // if ( __setting('site_title') ){
        //     $subject = __setting('site_title').' - ' . $subject;
        // }

        // return new Envelope(
        //     subject: $subject,
        // );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $template = EmailTemplate::where('locale', app()->getLocale())
                                 ->where('name', 'order_placed')
                                 ->first();

        if (empty($template)) {
            $template = EmailTemplate::where('locale', 'en')
                                     ->where('name', 'order_placed')
                                     ->first();
        }

        $body_text = $template->body_text ?? '';
        $body_html = $template->body_html ?? '';

        $placeholders = [
            '{{ customer_name }}' => $this->order->customer->name ?? '',
            '{{ order_number }}' => '#'.$this->order->order_number ?? '',
            '{{ order_total }}' => $this->order->total ?? '',
        ];

        $body_text = strtr($body_text, $placeholders);
        $body_html = strtr($body_html, $placeholders);

        return new Content(
            // markdown: 'emails.orders.placed',
            view: 'emails.orders.order-template',
            with: [
                'order' => $this->order,
                'customer' => $this->order->customer ?? '',
                'body_text' => $body_text,
                'body_html' => $body_html
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
