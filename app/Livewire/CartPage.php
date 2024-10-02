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

    protected $listeners = ['quantityUpdated' => 'updateCartQuantity'];

    public function updateCartQuantity($data)
    {
        if (isset($this->cart[$data['productId']])) {
            $this->cart[$data['productId']]['quantity'] = $data['quantity'];
            Session::put('cart', $this->cart);
        }

        $this->total_price = shoppingCartTotal();
    }

    public function render()
    {
        return view('livewire.cart-page', [
            'cart' => $this->cart
        ]);
    }
}
