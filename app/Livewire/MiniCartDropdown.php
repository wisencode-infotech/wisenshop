<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use Livewire\Component;

class MiniCartDropdown extends Component
{
    public $cart_items = [];
    public $total_price = 0;

    public $open_drawer = 'close';

    protected $listeners = [
        'quantityUpdated' => 'quantityUpdated',
        'refreshMiniCart' => 'openMiniCart',
        'remove-cart-product' => 'removeCartProduct'
    ];

    public function mount()
    {
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        $this->cart_items = CartHelper::items();
        $this->total_price = CartHelper::total();
    }

    public function openMiniCart() {
        $this->loadCartItems();
        $this->open_drawer = 'open';
    }

    public function closeDrawer()
    {
        $this->open_drawer = 'close'; // Close the drawer
        $this->dispatch('miniCartClosed');
    }

    public function removeCartProduct($product_id, $product_variation_id = null)
    {
        CartHelper::removeItem($product_id, (!empty($product_variation_id) ? $product_variation_id : null));

        $this->loadCartItems();

        $this->dispatch('itemRemoved');

        $this->dispatch('shoppingCartUpdated');
    }

    public function quantityUpdated()
    {
        $this->loadCartItems();
    }

    public function render()
    {
        return __appLivewireView('mini-cart-dropdown', [
            'cart_items' => $this->cart_items,
            'total_price' => $this->total_price,
        ]);
    }
}

