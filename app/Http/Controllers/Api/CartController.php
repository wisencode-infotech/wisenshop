<?php

namespace App\Http\Controllers\Api;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends APIController
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cartItems = $this->cartService->getCartItems();
        return $this->sendSuccess($cartItems, 'Cart items retrieved successfully');
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $this->cartService->addToCart($productId, $quantity);
        return $this->sendSuccess(null, 'Product added to cart');
    }

    public function remove($id)
    {
        $this->cartService->removeFromCart($id);
        return $this->sendSuccess(null, 'Product removed from cart');
    }
}
