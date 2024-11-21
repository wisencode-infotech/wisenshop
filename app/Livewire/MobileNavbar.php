<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class MobileNavbar extends Component
{
    public $cart_items_count = 0;

    protected $listeners = ['itemAdded', 'itemRemoved'];

    public function itemAdded()
    {
        $this->cart_items_count++;
    }

    public function itemRemoved()
    {
        if ($this->cart_items_count > 0)
            $this->cart_items_count--;
    }

    public function mount()
    {
        $cart = CartHelper::items();

        $this->cart_items_count = count($cart);
    }

    public function render()
    {
        return __appLivewireView('mobile-navbar');
    }
}
