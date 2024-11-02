<?php

namespace App\Jobs;

use App\Mail\OrderPlacedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use PDF;

class SendOrderPlacedEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function handle()
    {
        if (!empty($this->order->customer)) {
            // Generate PDF
            $pdf = PDF::loadView('backend.orders.pdf.order-info-pdf', ['order' => $this->order]);

            // Create email and attach PDF
            $email = new OrderPlacedMail($this->order);
            $email->attachData($pdf->output(), "order_{$this->order->order_number}.pdf", [
                'mime' => 'application/pdf',
            ]);

            // Send email
            Mail::to($this->order->customer_contact_email)->send($email);
        }
    }
}
