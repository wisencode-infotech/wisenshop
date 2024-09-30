<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function getUserOrders($userId)
    {
        return Order::where('user_id', $userId)->get();
    }

    public function createOrder(array $data)
    {
        // Logic to create an order
        return Order::create($data);
    }
}
