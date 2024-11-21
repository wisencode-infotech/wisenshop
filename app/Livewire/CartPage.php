<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartPage extends Component
{
    public $cart_items = [];

    public $total_price = 0;

    protected $listeners = ['quantityUpdated' => 'updateCartQuantity', 'remove-cart-product' => 'removeCartProduct'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart_items = CartHelper::items();
        $this->total_price = CartHelper::total();
    }

    public function updateCartQuantity($data = [])
    {
        $this->loadCart();
    }

    public function removeCartProduct($product_id, $product_variation_id = null)
    {
        CartHelper::removeItem($product_id, (!empty($product_variation_id) ? $product_variation_id : null));

        $this->loadCart();

        $this->dispatch('itemRemoved');

        $this->dispatch('shoppingCartUpdated');
    }

    public function render()
    {
        return __appLivewireView('cart-page', [
            'cart' => $this->cart_items
        ]);
    }
}
