<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function getCartItems()
    {
        return Cart::with('product')->where('user_id', Auth::user()->id)->get();
    }

    public function addToCart($product_id, $quantity = 1)
    {
        Cart::updateOrCreate(
            ['user_id' => Auth::user()->id, 'product_id' => $product_id],
            ['quantity' => DB::raw("quantity + $quantity")]
        );
    }

    public function removeFromCart($id)
    {
        Cart::where('user_id', Auth::user()->id)->where('id', $id)->delete();
    }
}
