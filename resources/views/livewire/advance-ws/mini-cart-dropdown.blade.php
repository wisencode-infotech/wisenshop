<div>
    <div class="mini-cart-dropdown {{ $open_drawer }}">
        <!-- mini cart close -->
        <div class="mini-cart-close" wire:click="closeDrawer">
           <a href="javascript:;"><i class="fa fa-times"></i></a>
        </div>
  
        <div class="cart-dropdown-wrapper">
           <!-- Order summary -->
           <div class="order-summary">
              <h3 class="account-title">{{ __trans('cart') }}</h3>
              @if (count($cart_items) > 0)
              <!-- summary product list-->
              <div class="summary-product-list">
                 @foreach($cart_items as $cart_item)
                 <div wire:key="cart-item-{{ $cart_item['product_id'].'-variation-'.$cart_item['product_variation_id'] }}" class="cart-product cart-summary-product">
                    <div class="cart-thumb">
                       <a {{ !empty($cart_item['product_slug']) ? 'wire:navigate' : '' }} href="{{ !empty($cart_item['product_slug']) ? route('frontend.product-detail', $cart_item['product_slug']) : 'Javascript:void(0);' }}">
                          <img src="{{ $cart_item['product_picture'] }}" alt="{{ $cart_item['product_name'] }}">
                       </a>
                    </div>
                    <div class="cart-product-title">
                       <div class="remove">
                          <a href="javascript:;" x-on:click="$dispatch('remove-cart-product', { product_id: {{ $cart_item['product_id'] }}, product_variation_id: {{ $cart_item['product_variation_id'] ?? 0 }} }) "><i class="fa fa-times"></i></a>
                       </div>
                       <h6>
                          <a {{ !empty($cart_item['product_slug']) ? 'wire:navigate' : '' }} href="{{ !empty($cart_item['product_slug']) ? route('frontend.product-detail', $cart_item['product_slug']) : 'Javascript:void(0);' }}">{{ $cart_item['product_name'] }}</a> 
                          @if (!empty($cart_item['product_variation_name']))
                             <span class="text-muted text-xs">[{{ $cart_item['product_variation_name'] }}]</span>
                          @endif
                       </h6>
                       <div class="product-qty variation-quantity">
                          @livewire('quantity-selector', ['product_id' => $cart_item['product_id'], 'product_variation_id' => $cart_item['product_variation_id'], 'layout' => 'mini-cart-drawer', key('mini-cart-quantity-selector-' . $cart_item['product_id'].'-variation-'.$cart_item['product_variation_id'])])
                          <div class="price">{{ __userCurrencySymbol() }} {{ $cart_item['product_price'] *  $cart_item['quantity']}}</div>
                       </div>
                    </div>
                 </div>
                 @endforeach
              </div>
              @else
              <p>
                  {{ __trans('Your cart is empty.') }}
              </p>
              @endif
  
              <!-- mini cart button-->
              <div class="mini-cart-buttons">
                 <a href="{{ route('frontend.home') }}" class="btn btn-outline-theme">{{ __trans('Continue shopping') }}</a>
                 @if (count($cart_items) > 0)
                 <a wire:navigate href="{{ route('frontend.guest.checkout') }}" class="btn btn-dark">{{ __trans('Checkout') }}</a>
                 @endif
              </div>
           </div>
        </div>
     </div>
</div>
