<?php

namespace App\Livewire;

use Livewire\Component;

class WishlistButton extends Component
{
    public $product_id;
    public $in_wish_list = false; // Track if the item is in the wishlist

    public function mount($product_id)
    {
        $this->product_id = $product_id;

        // Check if the item is in the session-based wishlist
        $wishlist = session()->get('wishlist', []);

        $this->in_wish_list = in_array($this->product_id, $wishlist);
    }

    public function toggleWishlist()
    {
        // Get the wishlist from the session or create an empty one
        $wishlist = session()->get('wishlist', []);

        if ($this->in_wish_list) {
            // Remove item from the wishlist
            $wishlist = array_diff($wishlist, [$this->product_id]);
            
            session()->put('wishlist', $wishlist);

            $this->in_wish_list = false;
        } else {
            // Add item to the wishlist

            $wishlist[] = $this->product_id;

            session()->put('wishlist', $wishlist);

            $this->in_wish_list = true;
        }

        $this->dispatch('wishListUpdated', $wishlist);
    }

    public function render()
    {
        return view('livewire.wishlist-button');
    }
}
