<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class MyWishlist extends Component
{
    public $wishlists;

    public function mount()
    {
        $this->loadWishlists();
    }

    public function loadWishlists()
    {
        $this->wishlists = Wishlist::where('user_id', Auth::id())->get();
    }

    public function removeFromWishlist($id)
    {
        $wishlistItem = Wishlist::find($id);
        
        if ($wishlistItem && $wishlistItem->user_id == Auth::id()) {
            $wishlistItem->delete();
            $this->loadWishlists(); // Refresh the wishlist
            session()->flash('message', 'Item removed from wishlist.');
        } else {
            session()->flash('error', 'Item not found.');
        }
    }

    public function render()
    {
        return view('livewire.my-wishlist');
    }
}
