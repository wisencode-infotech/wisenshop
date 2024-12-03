<?php

namespace App\Mail;

use App\Models\EmailTemplate;
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
    public $viewProductUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($product, $productVariation = null)
    {
        // Set the product data
        $this->product = $product;
        $this->productVariation = $productVariation;
        $this->viewProductUrl = route('frontend.product-detail', $product->slug);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // Retrieve email template based on the locale
        $template = EmailTemplate::where('locale', app()->getLocale())
            ->where('name', 'stock_reminder')
            ->first();

        if (empty($template)) {
            // Fallback to the default language (English)
            $template = EmailTemplate::where('locale', 'en')
                ->where('name', 'stock_reminder')
                ->first();
        }

        $sub = $template ? $template->subject : 'Product Back in Stock';

        $subject = $sub. ' - ' . $this->product->name;

        if (!empty($this->productVariation)) {
            $subject .= ' (' . $this->productVariation->name . ')';
        }

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $template = EmailTemplate::where('locale', app()->getLocale())
            ->where('name', 'stock_reminder')
            ->first();

        if (empty($template)) {
            // Fallback to the default language (English)
            $template = EmailTemplate::where('locale', 'en')
                ->where('name', 'stock_reminder')
                ->first();
        }

        // Get the template body (HTML)
        $body = $template->body_html;

        // Replace dynamic content placeholders with actual data
        $dynamicContent = str_replace(
            ['{{ product_name }}', '{{ product_variation }}', '{{ product_image }}', '{{ view_product_button }}'],
            [
                $this->product->name,
                $this->productVariation ? ' - ('.$this->productVariation->name.') ' : '',
                $this->generateProductImage(),
                $this->generateViewButton(),
            ],
            $body
        );

        return new Content(
            view: 'emails.stockReminder',  // The view where we render the dynamic content
            with: ['content' => $dynamicContent]
        );
    }

    private function generateProductImage()
    {
        return '<img src="'.$this->product->display_image_url.'" alt="'.$this->product->name.'" width="200" />';
    }

    private function generateViewButton()
    {
        $url = $this->viewProductUrl;

        return '<a href="' . $url . '" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">View Product</a>';
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
