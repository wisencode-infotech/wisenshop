<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductDetail extends Component
{
    public $product;

    public $meta;

    public function mount($product_slug)
    {
        $this->product = Product::authenticated()
            ->with(['category', 'images']) // Add any related models here to eager load
            ->where('slug', $product_slug)
            ->first();

        if (!$this->product)
            abort(404, "product_not_found");

        $this->setMeta();
    }

    public function setMeta()
    {
        $image = $this->product->display_image_url;

        $this->meta['keywords'] = $this->product->name ?? '';
        $this->meta['description'] = $this->product->description ?? '';
        $this->meta['og:image'] = $image ?? '';
    }

    public function render()
    {
        return __appLivewireView('product-detail', [
            'product' => $this->product,
        ]);
    }
}
