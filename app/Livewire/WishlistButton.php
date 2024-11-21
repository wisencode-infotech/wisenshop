<?php

namespace App\Livewire;

use App\Helpers\WishlistHelper;
use App\Models\ProductVariation;
use Livewire\Component;

class WishlistButton extends Component
{
    public $product_id;
    public $product_variation_id;
    public $in_wish_list = false; // Track if the item is in the wishlist

    public function mount($product_id, $product_variation_id = null)
    {
        $this->product_id = $product_id;

        if (!empty($product_variation_id)) {
            $this->product_variation_id = $product_variation_id;
        } else {
            $product_variations_query = ProductVariation::select('id')->where('product_id', $this->product_id);
            $this->product_variation_id = ($product_variations_query->count() > 0) ? $product_variations_query->first()->id ?? null : null;
        }

        $this->in_wish_list = WishlistHelper::exists($this->product_id, $this->product_variation_id);
    }

    public function toggleWishlist()
    {
        if ($this->in_wish_list) {

            WishlistHelper::removeWishlist($this->product_id, $this->product_variation_id);
            $this->in_wish_list = false;

            $this->dispatch('notify', 'error', __trans('Item removed from the wishlist'));
            
        } else {

            WishlistHelper::addWishlist($this->product_id, $this->product_variation_id);
            $this->in_wish_list = true;

            $this->dispatch('notify', 'success', __trans('Item added to the wishlist'));
        }

        $wishlist = WishlistHelper::items();

        $this->dispatch('wishListUpdated', $wishlist);
    }

    public function render()
    {
        return __appLivewireView('wishlist-button');
    }
}
