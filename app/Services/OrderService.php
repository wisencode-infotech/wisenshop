<?php

namespace App\Services;

use App\Mail\OrderPlacedMail;
use App\Mail\OrderStatusChangedMail;
use Illuminate\Support\Facades\Mail;
use App\Services\ProductService;

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

        $product_service = new ProductService();
        $product_service->updateStock($order);

        $this->sendOrderPlacedEmail();

        $data = [
            'title' => 'Order Placed',
            'message' => 'Your order #' . $order->id . ' has been placed successfully.',
            'user_id' => $order->user->id,
            'is_global' => false,
            'type' => 'order',
            'url' => route('frontend.orders.details', $order->id),
            'meta_data' => [
                'order_id' => $order->id,
                'total' => $order->total_price,
                'extra_info' => $order->extra_information,
            ],
            'is_read' => false
        ];

        __addNotification($data);
    }

    protected function sendOrderPlacedEmail()
    {
        // Send order placed email to the customer
        if ( !empty($this->order->customer) )
            Mail::to($this->order->customer_contact_email)->queue(new OrderPlacedMail($this->order));
    }

    protected function sendStatusChangedEmail()
    {
        // Send email notification for order status change
        if ( !empty($this->order->customer) )
            Mail::to($this->order->customer_contact_email)->queue(new OrderStatusChangedMail($this->order));
    }
}
