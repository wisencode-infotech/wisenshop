<?php

namespace App\Services;

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
    }
}
