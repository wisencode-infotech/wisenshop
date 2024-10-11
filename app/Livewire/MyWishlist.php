<?php

namespace App\Livewire;

use App\Helpers\WishlistHelper;
use App\Models\Product;
use Livewire\Component;

class MyWishlist extends Component
{
    public $wishlist_products;

    public function mount()
    {
        $this->setProducts();
    }

    public function setProducts()
    {
        $this->wishlist_products = Product::whereIn('id', WishlistHelper::items())->get();
    }

    public function removeFromWishlist($product_id)
    {
        WishlistHelper::removeWishlist($product_id);

        $this->setProducts();

        session()->flash('message', 'Item removed from wishlist.');
    }

    public function render()
    {
        return view('livewire.my-wishlist');
    }
}
