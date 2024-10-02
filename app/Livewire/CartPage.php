<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartPage extends Component
{
    public $cart = [];

    public function mount()
    {
        $this->cart = Session::get('cart', []);

        foreach ($this->cart as $productId => &$item) {
            // unset($this->cart[$productId]);
            $product = Product::find($productId);
            if ($product) {
                $item['product'] = $product;
            }
        }


    }

    protected $listeners = ['quantityUpdated' => 'updateCartQuantity'];

    public function updateCartQuantity($data)
    {
        // Update the quantity in the session cart
        if (isset($this->cart[$data['productId']])) {
            $this->cart[$data['productId']]['quantity'] = $data['quantity'];
            Session::put('cart', $this->cart); // Update the session cart
        }
    }


    public function render()
    {
        return view('livewire.cart-page', [
            'cart' => $this->cart
        ]);
    }
}
