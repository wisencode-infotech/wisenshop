<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartPage extends Component
{
    public $cart = [];

    public $total_price = 0;

    public function mount()
    {
        $this->cart = shoppingCart();

        $this->total_price = shoppingCartTotal();
    }

    protected $listeners = ['quantityUpdated' => 'updateCartQuantity', 'remove-cart-product' => 'removeCartProduct'];

    public function updateCartQuantity($data)
    {
        if (isset($this->cart[$data['productId']])) {
            $this->cart[$data['productId']]['quantity'] = $data['quantity'];
            Session::put('cart', $this->cart);
        }

        $this->total_price = shoppingCartTotal();
    }

    public function removeCartProduct($product_id)
    {

        if (!empty($this->cart[$product_id])) {
            
            unset($this->cart[$product_id]);

            Session::put('cart', $this->cart);

            $this->dispatch('itemRemoved');

            $this->total_price = shoppingCartTotal();

            $this->dispatch('shoppingCartUpdated');
        }
    }

    public function render()
    {
        return view('livewire.cart-page', [
            'cart' => $this->cart
        ]);
    }
}
