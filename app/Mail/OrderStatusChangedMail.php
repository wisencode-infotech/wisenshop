<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderStatusChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $viewOrderUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        $this->order = $order;

        $this->viewOrderUrl = route('frontend.orders.details', $order->id);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $template = EmailTemplate::where('locale', app()->getLocale())->where('name', 'order_updated')->first();

        if(empty($template)){
            $template = EmailTemplate::where('locale', 'en')->where('name', 'order_updated')->first();
        }

        $subject = $template ? $template->subject : 'Order Status Updated';

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $template = EmailTemplate::where('locale', app()->getLocale())->where('name', 'order_updated')->first();

        if(empty($template)){
            $template = EmailTemplate::where('locale', 'en')->where('name', 'order_updated')->first();
        }
        
        $body = $template->body_html;

        $dynamicContent = str_replace(
            ['{{ order_number }}', '{{ customer_name }}', '{{ customer_and_order_info }}', '{{ view_order_button }}'],
            [
                $this->order->id,
                $this->order->customer->name ?? 'Customer',
                $this->getCustomerAndOrderInfo(),
                $this->generateViewButton()
            ],
            $body
        );

        return new Content(
            view: 'emails.orders.status_changed',
            with: ['content' => $dynamicContent]
        );
    }

    private function getCustomerAndOrderInfo()
    {
        return view('emails.orders.order-summary', [
            'order' => $this->order,
            'customer' => $this->order->customer ?? '',
        ])->render();
    }

    // Function to generate dynamic button
    private function generateViewButton()
    {
        $url = $this->viewOrderUrl;

        return '<a href="' . $url . '" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">View Order Details</a>';
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
