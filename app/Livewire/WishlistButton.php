<?php

namespace App\Livewire;

use Livewire\Component;

class WishlistButton extends Component
{
    public $itemId;
    public $inWishlist = false; // Track if the item is in the wishlist

    public function mount($itemId)
    {
        $this->itemId = $itemId;
        // Check if the item is in the session-based wishlist
        $wishlist = session()->get('wishlist', []);
        $this->inWishlist = in_array($this->itemId, $wishlist);
    }

    public function toggleWishlist()
    {
        // Get the wishlist from the session or create an empty one
        $wishlist = session()->get('wishlist', []);

        if ($this->inWishlist) {
            // Remove item from the wishlist
            $wishlist = array_diff($wishlist, [$this->itemId]);
            session()->put('wishlist', $wishlist);
            $this->inWishlist = false;
        } else {
            // Add item to the wishlist
            $wishlist[] = $this->itemId;
            session()->put('wishlist', $wishlist);
            $this->inWishlist = true;
        }
    }

    public function render()
    {
        return view('livewire.wishlist-button');
    }
}
