<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use Livewire\Component;

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

    public function updateCartQuantity($data)
    {
        CartHelper::saveQuantity($data['product_id'], $data['product_variation_id'], $data['quantity']);

        $this->cart_items = CartHelper::items();

        $this->total_price = CartHelper::total();
    }

    public function removeCartProduct($product_id, $product_variation_id)
    {
        CartHelper::removeItem($product_id, $product_variation_id);

        $this->cart_items = CartHelper::items();

        $this->total_price = CartHelper::total();

        $this->dispatch('itemRemoved');

        $this->dispatch('shoppingCartUpdated');
    }

    public function render()
    {
        return view('livewire.cart-page', [
            'cart' => $this->cart_items
        ]);
    }
}
