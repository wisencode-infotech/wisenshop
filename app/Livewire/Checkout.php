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
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $shipping_addresses = null;
    public $billing_addresses = null;
    public $selected_shipping_address_id;
    public $selected_billing_address_id;
    public $selected_payment_method_id;
    public $payment_method_description;
    public $cart_items = [];
    public $total_price = 0;
    public $payment_methods = null;
    public $shipping_method = null;
    public $phone;
    public $email;
    public $order_notes;
    public $isPlacingOrder = false;
    public $copy_to_billing = false;
    
    protected $listeners = ['addressSaved' => 'loadAddresses'];

    public function mount()
    {
        if (CartHelper::isEmpty())
            return redirect()->intended(route('frontend.cart'));

        $this->shipping_addresses = ShippingAddress::where('user_id', Auth::user()->id)->get();
        $this->billing_addresses = BillingAddress::where('user_id', Auth::user()->id)->get();

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

        $this->phone = Auth::user()->phone;
        $this->email = Auth::user()->email;
    }

    public function selectShippingAddress($address_id)
    {
        $this->selected_shipping_address_id = $address_id;
    }

    public function copyShippingAddress()
    {
        if ($this->copy_to_billing && $this->selected_shipping_address_id)
            $this->selected_billing_address_id = null;
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
        $this->selected_shipping_address_id = null;
        $this->selected_billing_address_id = null;
        
        $this->shipping_addresses = ShippingAddress::where('user_id', Auth::user()->id)->get();
        $this->billing_addresses = BillingAddress::where('user_id', Auth::user()->id)->get();
        
        if ($this->shipping_addresses->isNotEmpty() && count($this->shipping_addresses) == 1) {
            $this->selected_shipping_address_id = $this->shipping_addresses->first()->id;
        }
        
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
        
        $product_service = new ProductService();
        $stock_available = $product_service->validateStock(CartHelper::items());

        if ( !empty($stock_available) ) {
            foreach ($stock_available as $stock_available_each_product) {
                if ( $stock_available_each_product['is_variant'] == true ) {
                    $this->dispatch('notify', 'error', __trans('Item '. $stock_available_each_product['product_variant']->name .' stock not available. please remove from cart.'));
                } else if ( $stock_available_each_product['is_variant'] == false ) {
                    $this->dispatch('notify', 'error', __trans('Item '. $stock_available_each_product['product']->name .' stock not available. please remove from cart.'));
                }
            }
        }

        if ( empty($stock_available) ) {

            if ($this->copy_to_billing) {

                $shipping_address = ShippingAddress::find($this->selected_shipping_address_id);

                if ($shipping_address) {

                    $billing_address = BillingAddress::create([
                        'user_id' => Auth::user()->id,
                        'address' => $shipping_address->address,
                        'city' => $shipping_address->city,
                        'state' => $shipping_address->state,
                        'postal_code' => $shipping_address->postal_code,
                        'country' => $shipping_address->country,
                    ]);

                    $this->selected_billing_address_id = $billing_address->id;
                }
            }

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

            $payment_method = $order?->payment?->details?->name ?? '';

            if ($payment_method != 'Cash on Delivery') {
                return redirect()->route('frontend.payment.process', [
                    'order' => $order->id, 
                    'method' => $payment_method
                ]);
            } else {
                $this->isPlacingOrder = false;

                $order_service = new OrderService();
                $order_service->placeOrder($order);

                // Clear the cart after successful order placement
                CartHelper::clearDatabaseCart();

                $this->dispatch('notify', 'success', __trans('Order placed successfully!'));

                return redirect()->intended('/thank-you/' . $order_id);
            }
        }
    }

    public function render()
    {
        return __appLivewireView('checkout', [
            'cart' => $this->cart_items
        ]);
    }
}
