<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductVariation;
use Livewire\Component;

class ProductPrice extends Component
{
    public $product_id;
    public $product_variation_id;
    public $price = 0;

    public function mount($product_id, $product_variation_id = null)
    {
        $this->product_id = $product_id;

        $this->product_variation_id = $product_variation_id;

        if (empty($product_variation_id)) {
            $product_variation = ProductVariation::select('id')->where('product_id', $this->product_id)->first();
            $this->product_variation_id = $product_variation->id ?? null;
        }

        $this->setPrice();
    }

    public function getListeners()
    {
        return [
            "productVariantChanged-{$this->product_id}" => 'productVariantChanged'
        ];
    }

    public function setPrice()
    {
        if (!empty($this->product_variation_id)) {
            $this->price = $this->productVariation()->priceWithCurrency();
        } else {
            $this->price = $this->product()->priceWithCurrency();
        }
    }

    public function productVariantChanged($product_id, $product_variation_id = null)
    {
        if ($this->product_id !== $product_id)
            return;
        
        $this->product_id = $product_id;

        $this->product_variation_id = $product_variation_id;

        $this->setPrice();
    }

    public function product()
    {
        return Product::where('id', $this->product_id)->select('id', 'price')->first();
    }

    public function productVariation()
    {
        return ProductVariation::where('id', $this->product_variation_id)->select('id', 'price')->first();
    }

    public function render()
    {
        return __appLivewireView('product-price', [
            'price' => $this->price
        ]);
    }
}
