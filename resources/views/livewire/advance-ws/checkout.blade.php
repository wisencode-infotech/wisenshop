@section('title', __trans('Checkout'))

<div>
      <!-- heading banner section -->
      <section class="heading-banner-section">
         <!-- container -->
         <div class="container">
            <!-- row -->
            <div class="row">
               <!-- column -->
               <div class="col-12">
                  <!-- heading banner wrap-->
                  <div class="heading-banner-wrap">
                     <!-- breadcrumb -->
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">{{ __trans('Home') }}</a></li>
                           <li class="breadcrumb-item active" aria-current="page">{{ __trans('Checkout') }}</li>
                        </ol>
                     </nav>
                     <!-- page title -->
                     <h1>{{ __trans('Checkout') }}</h1>

                     <!-- heading banner img -->
                     <div class="heading-banner-img">
                        <!-- <img src="assets/images/heading-banner-img.png" alt="heading banner img"> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </section>
      <!--/ End Hero slider section -->

      <!-- Checkout page section -->
      <section class="checkout-page section-two">
         <!-- container -->
         <div class="container">
            <!-- row -->
            <div class="row">
               <!-- column -->
               <div class="col-12 col-md-7 col-lg-8 pe-lg-5">
                  <!-- Account details form-->
                  <div class="account-address-form">
                     <h3 class="account-title">{{ __trans('Billing details') }}</h3>
                     <div class="all-form">
                        <div class="form-row">
                           <div class="col-12 col-sm-6">
                              <div class="form-group">
                                 <label>{{ __trans('Email') }}*</label>
                                 <input wire:model="email" type="Email" class="form-control" placeholder="{{ __trans('Enter your email') }}">
                                 @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
                              </div>
                           </div>
                           <div class="col-12 col-sm-6">
                              <div class="form-group">
                                 <label>{{ __trans('Phone') }}*</label>
                                 <input wire:model="phone" placeholder="1 (702) 123-4567" type="tel" class="form-control">
                              </div>
                           </div>
                        </div>

                        <div wire:loading.flex wire:target.except="placeOrder, selectPaymentMethod" class="fixed inset-0 z-10 flex items-center justify-center bg-accent-400 bg-opacity-10">
                              <div class="loader"></div>
                        </div>

                        <div wire:loading.flex  wire:target="placeOrder" class="fixed inset-0 z-10 flex items-center justify-center bg-accent-400 bg-opacity-10">
                              <div class="loader"></div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <h6>{{ __trans('Shipping Address') }}</h6>
                           </div>
                           <div class="col-md-6">
                              <button wire:click="$dispatch('open-modal', { type: 'shipping' })" class="btn" style="float: right;">
                                 <i class="fa fa-plus"></i>{{ __trans('Add') }}
                              </button>
                           </div>
                        </div>

                        <div class="bg-light p-5 shadow-md">
                           <div role="radiogroup" aria-labelledby="shipping-address-label">
                              <label class="sr-only" id="shipping-address-label">{{ __trans('Shipping Address') }}</label>
                              <div class="row g-3">
                                 @if(count($shipping_addresses) != 0)
                                    @foreach($shipping_addresses as $shipping_address)
                                       <div class="col-sm-6 col-md-4">
                                          <div wire:click="selectShippingAddress({{ $shipping_address->id }})" class="card border {{ $selected_shipping_address_id === $shipping_address->id ? 'border-success' : 'border-secondary' }} shipping_address_container" style="cursor: pointer;">
                                             <div class="card-body">
                                                <h6 class="card-title">{{ __trans('Shipping') }}</h6>
                                                <p class="card-text text-muted">
                                                   {{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->state }} {{ $shipping_address->postal_code }}, {{ $shipping_address->country }}
                                                </p>
                                                <div class="btn-group" role="group">
                                                   <a class="p-1" wire:click="$dispatch('editShippingAddress', { address_id: {{ $shipping_address->id }} })">
                                                      <i class="fa fa-pencil"></i>
                                                   </a>
                                                   <a class="p-1 text-red-500" wire:click="$dispatch('deleteShippingAddress', { address_id: {{ $shipping_address->id }} })">
                                                      <i class="fa fa-trash"></i>
                                                   </a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    @endforeach
                                 @else
                                    <div class="text-muted">
                                       {{ __trans('No address available.') }}
                                    </div>
                                 @endif
                              </div>
                              @error('selected_shipping_address_id') 
                                 <span class="text-danger">{{ $message }}</span> 
                              @enderror
                           </div>
                        </div>

                        <div class="row mt-4">
                           <div class="col-md-6">
                              <h6>{{ __trans('Billing Address') }}</h6>
                           </div>
                           <div class="col-md-6">
                              @if(!$copy_to_billing)
                              <button wire:click="$dispatch('open-modal', { type: 'billing' })" class="btn" style="float: right;">
                                 <i class="fa fa-plus"></i>{{ __trans('Add') }}
                              </button>
                              @endif
                           </div>
                        </div>

                        <div class="bg-light p-5 shadow-md">
                           <div class="d-flex align-items-center justify-content-between mb-4">

                              <!-- Same as Shipping Checkbox -->
                              @if(count($shipping_addresses) != 0)
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="checkbox" id="copy_to_billing" wire:model="copy_to_billing" wire:click="copyShippingAddress">
                                 <label class="form-check-label" for="copy_to_billing">Same as Shipping Address</label>
                              </div>
                              @endif
                           </div>

                           <!-- Addresses Grid -->
                           <div class="row g-3">
                              @if(!$copy_to_billing)
                                 @if(count($billing_addresses) != 0)
                                 @foreach($billing_addresses as $billing_address)
                                 <div class="col-sm-6 col-md-4">
                                    <div wire:click="selectBillingAddress({{ $billing_address->id }})" class="card border-{{ $selected_billing_address_id === $billing_address->id ? 'success' : 'secondary' }} shipping_address_container" style="cursor: pointer;">
                                       <div class="card-body">
                                          <h6 class="card-title">Billing</h6>
                                          <p class="card-text">
                                             {{ $billing_address->address }}, {{ $billing_address->city }}, {{ $billing_address->state }} 
                                             {{ $billing_address->postal_code }}, {{ $billing_address->country }}
                                          </p>
                                          <div class="btn-group" role="group">
                                             <a wire:click="$dispatch('editBillingAddress', { address_id: {{ $billing_address->id }} })" class="p-1">
                                                <i class="fa fa-pencil"></i>
                                             </a>
                                             <a wire:click="$dispatch('deleteBillingAddress', { address_id: {{ $billing_address->id }} })" class="p-1 text-red-500">
                                                <i class="fa fa-trash"></i>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 @endforeach
                                 @else
                                 <!-- No Address Message -->
                                 <div class="col-12 text-muted text-center">
                                 No address available.
                                 </div>
                                 @endif
                              @endif
                           </div>
                           </div>


                        
                        <div class="form-group">
                           <label>{{ __trans('Order Note') }}</label>
                           <input type="text" id="orderNote" wire:model="order_notes" class="form-control" placeholder="Notes about your orders.">
                        </div>

                     </div>
                  </div>
               </div>
               <!-- column -->
               <div class="col-12 col-md-5 col-lg-4">
                  <!-- Order summary -->
                  <div class="order-summary">
                     <h3 class="account-title">Order summary</h3>
                     <!-- summary product list-->
                     <div class="summary-product-list">
                        @foreach($cart as $cart_key => $item)
                        <div class="cart-product cart-summary-product">
                           <div class="cart-thumb">
                              <a href="account-order.html"><img src="{{ $item['product_picture'] }}" alt="blog img 1"></a>
                           </div>
                           <div class="cart-product-title">
                              <h6><span class="text-sm text-body"><span class="text-sm font-bold text-heading">{{ $item['quantity'] }}</span><span class="mx-2">x</span>{{ $item['product_name'] }}
                              @if (!empty($item['product_variation_name']))
                                    | <span>{{ $item['product_variation_name'] }}</span>
                              @endif
                              </h6>
                              <div class="product-qty">
                                 <div class="price">{{ __userCurrencySymbol() }} {{ $item['product_price'] * $item['quantity'] }}</div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>

                     <div class="cart-total-body">
                        <div class="cart-list">
                           <h6>Subtotal</h6>
                           <span>{{ __userCurrencySymbol() }} {{ number_format($total_price, 2) }}</span>
                        </div>
                        <div class="cart-list">
                           <h6>Shipping</h6>
                           <span>{{ __userCurrencySymbol() }}0.00</span>
                        </div>
                        <div class="cart-list cart-total">
                           <h6>Total</h6>
                           <span>{{ __userCurrencySymbol() }} {{ number_format($total_price, 2) }}</span>
                        </div>
                     </div>
                  </div>

                  <!-- Choose payment method -->
                  <div class="choose-payment-method">
                     <h6>Choose payment method</h6>
                     <div class="cart-list shipping-cart-list">
                        
                        @foreach($payment_methods as $payment_method)
                           <div class="shipping-total-list">
                              <label class="checkcontainer">
                                 <input name="payment_method" wire:click="selectPaymentMethod({{ $payment_method->id }}, '{{ $payment_method->description }}')" type="radio" {{ $selected_payment_method_id === $payment_method->id ? 'checked' : '' }}>
                                 <span class="checkmark">{{ $payment_method->name }}</span>
                              </label>
                           </div>
                        @endforeach
                     </div>

                     @if(!empty($payment_method_description))
                        <div class="form-group form-check">
                           <label class="form-check-label" for="exampleCheck2">{{ $payment_method_description }}</label>
                        </div>
                     @endif
                     
                  </div>

                  <!-- Proceed to payment button -->

                  @if(count($cart) != 0)
                  <div class="cart-checkout-button">
                  <button wire:click="placeOrder"  wire:loading.attr="disabled" data-variant="normal" class="btn btn-dark">
                     <span wire:loading.remove wire:target="placeOrder">
                        {{ __trans('Place Order') }}
                     </span>
                     <span wire:loading wire:target="placeOrder">
                        {{ __trans('Placing Order...') }}
                     </span>
                  </button>
                  </div>
                  @endif
               </div>
            </div>
         </div>
      </section>
      <!--/ End Checkout page section -->
</div>


