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

                        <h6>{{ __trans('Shipping Address') }}</h6>

                        <div class="bg-light p-5 shadow-700 md:p-8">
                              <div class="mb-5 flex items-center justify-between md:mb-8">
                                 <div class="flex items-center space-x-3 rtl:space-x-reverse md:space-x-4">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-accent text-base text-accent-contrast lg:text-xl">2</span>
                                    <p class="text-lg capitalize text-heading lg:text-xl">{{ __trans('Shipping Address') }}</p>
                                 </div>
                                 <button wire:click="$dispatch('open-modal', { type: 'shipping' })" class="flex items-center text-sm font-semibold text-accent transition-colors duration-200 hover:text-accent-hover focus:text-accent-hover focus:outline-0">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 stroke-2 ltr:mr-0.5 rtl:ml-0.5">
                                       <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    {{ __trans('Add') }}
                                 </button>
                              </div>
                              <div id="headlessui-radiogroup-:rc:" role="radiogroup" aria-labelledby="headlessui-label-:rd:">
                                 <label class="sr-only" id="headlessui-label-:rd:" role="none">{{ __trans('Shipping Address') }}</label>
                                 <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3" role="none">

                                 @if(count($shipping_addresses) != 0)
                                    @foreach($shipping_addresses as $shipping_address) 
                                       <div id="headlessui-radiogroup-option-:re:" role="radio" aria-checked="false" tabindex="0" data-headlessui-state="">
                                          <div wire:click="selectShippingAddress({{ $shipping_address->id }})" class="group relative cursor-pointer rounded border p-4 hover:border-accent border-transparent bg-gray-100 shipping_address_container {{ $selected_shipping_address_id === $shipping_address->id ? 'active' : '' }}">
                                             
                                             <p class="mb-3 text-sm font-semibold capitalize text-heading">{{ __trans('Shipping') }}</p>
                                             <p class="text-sm text-sub-heading">{{ $shipping_address->address }}, {{ $shipping_address->city }}, {{ $shipping_address->state }} {{ $shipping_address->postal_code }}, {{ $shipping_address->country }}</p>
                                             <div class="absolute top-4 flex space-x-2 opacity-0 group-hover:opacity-100 ltr:right-4 rtl:left-4 rtl:space-x-reverse">
                                                <button wire:click="$dispatch('editShippingAddress', { address_id: {{ $shipping_address->id }} })" class="flex h-5 w-5 items-center justify-center rounded-full bg-accent text-light">
                                                   <span class="sr-only">{{ __trans('Edit') }}</span>
                                                   <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                      <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                   </svg>
                                                </button>
                                                <button wire:click="$dispatch('deleteShippingAddress', { address_id: {{ $shipping_address->id }} })" class="flex h-5 w-5 items-center justify-center rounded-full bg-red-600 text-light">
                                                   <span class="sr-only">{{ __trans('Delete') }}</span>
                                                   <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                   </svg>
                                                </button>
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

                                 @error('selected_shipping_address_id') <span class="text-red-500">{{ $message }}</span> @enderror

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


