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
        $this->product = Product::authenticated()->where('slug', $product_slug)->first();

        if (!$this->product)
            return redirect()->route('frontend.error', [ 401 ]); // Redirect to your 404 route.

        $this->setMeta();
    }

    public function placeholder()
    {
        return view('livewire.skeleton-detail-page-loader');
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
        return view('livewire.product-detail', [
            'product' => $this->product,
        ]);
    }
}
