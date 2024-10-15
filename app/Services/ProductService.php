<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductVariation as ModelsProductVariation;

class ProductService
{
    public $order;

    public function updateStock($order)
    {
        if ( true ) {
            $order_items = $order->orderItems;

            foreach ($order_items as $order_item) {
                if (!empty($order_item->product_variation_id)) {
                    $product_variant = ModelsProductVariation::find($order_item->product_variation_id);
                    $product_variant->stock = $product_variant->stock - $order_item->quantity;
                    $product_variant->save();
                } else if (!empty($order_item->product_id)) {
                    $product = Product::find($order_item->product_id);
                    $product->stock = $product->stock - $order_item->quantity;
                    $product->save();
                }
            }
        }
    }

    public function validateStock($cart_items) {

        $response = [];

        if ( true ) {

            foreach ($cart_items as $cart_item) {
                if (!empty($cart_item['product_variation_id'])) {
                    $product_variant = ModelsProductVariation::find($cart_item['product_variation_id']);
                    if($cart_item['quantity'] > $product_variant->stock) {
                        $response[] = [
                            'valid_stock' => false,
                            'is_variant' => true,
                            'product_variant' => $product_variant
                        ];
                    }
                } else if (!empty($cart_item['product_id'])) {
                    $product = Product::find($cart_item['product_id']);
                    if($cart_item['quantity'] > $product->stock) {
                        $response[] = [
                            'valid_stock' => false,
                            'is_variant' => false,
                            'product' => $product
                        ];
                    }
                }
            }
            
        }

        return $response;
    }
}
