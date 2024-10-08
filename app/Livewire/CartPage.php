<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartPage extends Component
{
    public $cart_items = [];

    public $total_price = 0;

    public function mount()
    {
        $this->cart_items = CartHelper::items();

        $this->total_price = CartHelper::total();
    }

    protected $listeners = ['quantityUpdated' => 'updateCartQuantity', 'remove-cart-product' => 'removeCartProduct'];

    public function updateCartQuantity($data = [])
    {
        $this->cart_items = CartHelper::items();

        $this->total_price = CartHelper::total();
    }

    public function removeCartProduct($product_id, $product_variation_id = null)
    {
        CartHelper::removeItem($product_id, (!empty($product_variation_id) ? $product_variation_id : null));

        $this->cart_items = CartHelper::items();

        $this->total_price = CartHelper::total();

        $this->dispatch('itemRemoved');

        $this->dispatch('shoppingCartUpdated');
    }

    public function handleCheckout()
    {
        if (Auth::check()) {
            // If the user is logged in, redirect to the checkout page
            return redirect()->intended('/checkout');
        } else {
            // If the user is not logged in, redirect to guest checkout form
            return redirect()->intended('/guest-checkout');
        }
    }

    public function render()
    {
        // dd($this->cart_items);
        return view('livewire.cart-page', [
            'cart' => $this->cart_items
        ]);
    }
}
