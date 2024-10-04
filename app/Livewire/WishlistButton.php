<?php

namespace App\Livewire;

use App\Helpers\WishlistHelper;
use Livewire\Component;

class WishlistButton extends Component
{
    public $product_id;
    public $in_wish_list = false; // Track if the item is in the wishlist

    public function mount($product_id)
    {
        $this->product_id = $product_id;

        // Check if the item is in the session-based wishlist
        $wishlist = WishlistHelper::items();

        $this->in_wish_list = in_array($this->product_id, $wishlist);
    }

    public function toggleWishlist()
    {
        if ($this->in_wish_list) {

            WishlistHelper::removeWishlist($this->product_id);
            $this->in_wish_list = false;
            
        } else {

            WishlistHelper::addWishlist($this->product_id);
            $this->in_wish_list = true;
        }

        $wishlist = WishlistHelper::items();

        $this->dispatch('wishListUpdated', $wishlist);
    }

    public function render()
    {
        return view('livewire.wishlist-button');
    }
}
