<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function getCartItems()
    {
        return Cart::with('product')->where('user_id', auth()->id())->get();
    }

    public function addToCart($productId, $quantity = 1)
    {
        Cart::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $productId],
            ['quantity' => DB::raw("quantity + $quantity")]
        );
    }

    public function removeFromCart($id)
    {
        Cart::where('user_id', auth()->id())->where('id', $id)->delete();
    }
}
