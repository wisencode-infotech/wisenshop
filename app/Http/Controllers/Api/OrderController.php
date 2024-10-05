<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends APIController
{
    protected $order_service;

    public function __construct(OrderService $order_service)
    {
        $this->order_service = $order_service;
    }

    public function index()
    {
        return $this->sendSuccess([], 'Orders retrieved successfully');
    }

    public function store(Request $request)
    {
        return $this->sendSuccess([], 'Order placed successfully', 201);
    }

    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return $this->sendError('Order not found', 404);
        }

        return $this->sendSuccess($order, 'Order retrieved successfully');
    }
}
