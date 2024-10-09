<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShippingAddress;
use App\Models\BillingAddress;
use App\Models\PaymentMethod;
use App\Models\ShippingMethod;
use App\Helpers\CartHelper;
use App\Models\Order;
use App\Services\OrderService;

class Checkout extends Component
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
    public $shipping_method = [];
    public $phone;
    public $email;
    public $order_notes;
    public $isPlacingOrder = false;
    

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

        if ($this->payment_methods->isNotEmpty()) {

            $payment_method = $this->payment_methods->where('is_default', 1)->first();

            $this->selected_payment_method_id = $payment_method->id;
            $this->payment_method_description = $payment_method->description;
        }

        $this->shipping_method = ShippingMethod::where('is_active', 1)->first();

        $this->phone = auth()->user()->phone;
        $this->email = auth()->user()->email;
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

    public function placeOrder()
    {
        $this->isPlacingOrder = true;

        $this->validate([
            'selected_shipping_address_id' => 'required',
            'selected_payment_method_id' => 'required',
            'email' => 'nullable|email|required_without:phone',
            'phone' => 'nullable|required_without:email',
        ], [
            'selected_shipping_address_id.required' => 'Please select a shipping address.',
            'payment_method.required' => 'Please select a payment method.',
            'email.email' => 'Please provide a valid email address.',
            'email.required_without' => 'Please provide either phone or email.',
            'phone.required_without' => 'Please provide either phone or email.',
        ]);

        $order_id = CartHelper::createOrder([
                    'shipping_address_id' => $this->selected_shipping_address_id,
                    'billing_address_id' => $this->selected_billing_address_id,
                    'payment_method_id' => $this->selected_payment_method_id,
                    'total_price' => $this->total_price,
                    'phone' => $this->phone,
                    'email' => $this->email,
                    'order_notes' => $this->order_notes,
                    'currency' => __userCurrency(),
                ]);

        $order = Order::find($order_id);

        $this->isPlacingOrder = false;

        $order_service = new OrderService();
        $order_service->placeOrder($order);

        session()->flash('message', 'Order placed successfully!');

        return redirect()->intended('/');
    }

    public function render()
    {
        return view('livewire.checkout', [
            'cart' => $this->cart_items
        ]);
    }
}
