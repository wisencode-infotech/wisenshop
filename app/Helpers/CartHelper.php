<?php

namespace App\Helpers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartHelper
{
    public static function disk()
    {
        return (Auth::check()) ? 'database' : 'session';
    }

    public static function saveQuantity($product_id, $product_variant_id, $quantity)
    {
        $disk = self::disk();

        $user_id = (Auth::check()) ? Auth::user()->id : 'session';

        if ($disk == 'database') { // Save to database
            if ($quantity > 0) {
                Cart::updateOrCreate(
                    [
                        'user_id' => $user_id,
                        'product_id' => $product_id,
                    ],
                    ['quantity' => $quantity]
                );
            } else {
                Cart::where('user_id', $user_id)
                    ->where('product_id', $product_id)
                    ->delete();
            }
        } else { // Save to session
            $cart = CartHelper::items();

            if ($quantity > 0) {
                $cart[$product_id] = [
                    'quantity' => $quantity,
                ];
            } else {
                unset($cart[$product_id]);
            }

            Session::put('cart', $cart);
        }
    }

    public static function items()
    {
        $user_id = (Auth::check()) ? Auth::user()->id : 'session';
        
        $cart_items = [];

        if (self::disk() == 'database') {

            $db_cart_items  = Cart::where('user_id', $user_id)->get();

            $cart_items = [];

            foreach ($db_cart_items as $db_item) {
                $cart_items[$db_item->product_id] = [
                    'quantity' => $db_item->quantity,
                    'product_price' => $db_item->product->discounted_price ?? 0,
                    'product' => $db_item->product,
                ];
            }

            return $cart_items;

        } else {

            $cart_items = Session::get('cart', []);

            foreach ($cart_items as $product_id => &$item) {
                $product = Product::find($product_id);

                if ($product) {
                    $item['product'] = $product;
                    $item['product_price'] = ($product->discounted_price ?? 0);
                }
            }

            return $cart_items;
        }
    }

    public static function removeItem($product_id, $product_variant_id)
    {
        self::saveQuantity($product_id, $product_variant_id, 0);
    }

    public static function total()
    {
        $cart_items = self::items();

        $total = 0;

        foreach ($cart_items as $item) {
            $total += ($item['quantity'] ?? 0) * ($item['product_price'] ?? 0);
        }

        return $total;
    }

    public static function syncToDatabse($user_id = null)
    {
        $user_id =  (!empty($user_id)) ? $user_id : Auth::user()->id;

        $cart_items = Session::get('cart', []);

        foreach ($cart_items as $product_id => $value) {

            $cart_product = Cart::where('product_id', $product_id)->where('user_id', $user_id)->first();

            $quantity = $value['quantity'];

            if (!empty($cart_product)) {
                $quantity = $quantity + $cart_product->quantity;
            } else {
                $cart_product = new Cart();
            }

            $cart_product->user_id = $user_id;
            $cart_product->product_id = $product_id;
            $cart_product->quantity = $quantity;
            $cart_product->save();
        }

        Session::forget('cart');
    }
}