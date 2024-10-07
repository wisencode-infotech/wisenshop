<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShippingAddress;
use App\Models\BillingAddress;
use App\Models\PaymentMethod;
use App\Helpers\CartHelper;

class ShippingComponent extends Component
{
    public $shipping_addresses = [];
    public $billing_addresses = [];
    public $selected_shipping_address_id;
    public $selected_billing_address_id;
    public $selected_payment_method_id;
    public $payment_method_description;
    public $cart_items = [];
    public $total_price = 0;
    public $payment_methods = [];

    protected $listeners = ['addressSaved' => 'loadAddresses'];

    public function mount(){

        $this->shipping_addresses = ShippingAddress::where('user_id', auth()->user()->id)->get();
        $this->billing_addresses = BillingAddress::where('user_id', auth()->user()->id)->get();

        // Select the first address by default if there are any addresses
        if ($this->shipping_addresses->isNotEmpty()) {
            $this->selected_shipping_address_id = $this->shipping_addresses->first()->id;
        }

        if ($this->billing_addresses->isNotEmpty()) {
            $this->selected_billing_address_id = $this->billing_addresses->first()->id;
        }

        $this->cart_items = CartHelper::items();
        $this->total_price = CartHelper::total();

        $this->payment_methods = PaymentMethod::all();
    }

    public function selectShippingAddress($address_id)
    {
        $this->selected_shipping_address_id = $address_id;
    }

    public function selectBillingAddress($address_id)
    {
        $this->selected_billing_address_id = $address_id;
    }

    public function selectPaymentMethod($payment_method_id, $payment_description)
    {
        $this->selected_payment_method_id = $payment_method_id;

        $this->payment_method_description = $payment_description;
    }

    public function loadAddresses()
    {
        $this->shipping_addresses = ShippingAddress::where('user_id', auth()->user()->id)->get();
        $this->billing_addresses = BillingAddress::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.shipping-component', [
            'cart' => $this->cart_items
        ]);
    }
}
