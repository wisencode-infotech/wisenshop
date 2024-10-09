<?php

namespace App\Services;

use App\Mail\OrderPlacedMail;
use App\Mail\OrderStatusChangedMail;
use Illuminate\Support\Facades\Mail;

class OrderService
{
    public $order;

    public function setRecord($order)
    {
        $this->order = $order;
    }

    public function updateStatus($status)
    {
        $this->order->status = $status;

        $this->order->save();

        $this->sendStatusChangedEmail();
    }

    public function placeOrder($order)
    {
        $this->setRecord($order);

        // Send email when the order is placed
        $this->sendOrderPlacedEmail();
    }

    protected function sendOrderPlacedEmail()
    {
        // Send order placed email to the customer
        if ( !empty($this->order->customer) )
            Mail::to($this->order->customer->email)->queue(new OrderPlacedMail($this->order));
    }

    protected function sendStatusChangedEmail()
    {
        // Send email notification for order status change
        if ( !empty($this->order->customer) )
            Mail::to($this->order->customer->email)->queue(new OrderStatusChangedMail($this->order));
    }
}
