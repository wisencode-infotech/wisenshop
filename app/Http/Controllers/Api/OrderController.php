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
        $orders = $this->order_service->getUserOrders(auth()->user()->id);
        return $this->sendSuccess($orders, 'Orders retrieved successfully');
    }

    public function store(Request $request)
    {
        $order = $this->order_service->createOrder($request->all());
        return $this->sendSuccess($order, 'Order placed successfully', 201);
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
