<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductVariation as ModelsProductVariation;

class ProductService
{
    public $order;

    public function updateStock($order)
    {
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
