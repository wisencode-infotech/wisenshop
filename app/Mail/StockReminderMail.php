<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StockReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;  // To hold the product instance
    public $productVariation;  // To hold the productVariation instance

    /**
     * Create a new message instance.
     */
    public function __construct($product, $productVariation = null)
    {
        // Set the product data
        $this->product = $product;
        $this->productVariation = $productVariation;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        $subject = 'Product Back in Stock - ' . $this->product->name;

        if (!empty($this->productVariation)) {
            $subject .= ' for '. $this->productVariation->name;
        }

        return new Envelope(
            subject: $subject, // Include product name in subject
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.stockReminder',  // The markdown view to use
            with: [
                'product' => $this->product,
                'productVariation' => $this->productVariation
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
