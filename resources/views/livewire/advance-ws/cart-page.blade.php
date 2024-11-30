@section('title', __trans('Cart'))

<div>
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
                                <li class="breadcrumb-item"><a wire:navigate href="{{ route('frontend.home') }}">{{ __trans('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __trans('Cart') }}</li>
                            </ol>
                        </nav>
                        <!-- page title -->
                        <h1>{{ __trans('Cart') }}</h1>

                        <!-- heading banner img -->
                        <div class="heading-banner-img">
                            <!-- <img src="assets/images/heading-banner-img.png" alt="heading banner img"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <section class="account-dashboard-page section-two">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- column -->
                <div class="col-12 col-md-4 col-lg-3">
                    <!-- My Account left menu -->
                    @livewire('user-sidebar')
                </div>
                <!-- column -->
                <div class="col-12 col-md-8 col-lg-9">
                    <!-- My Account right wrap -->
                    <div class="account-right-wrap">
                    
                    @if (count($cart) == 0)
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                           <!-- column -->
                           <div class="col-12">
                              <!-- Empty Cart content -->
                              <div class="empty-cart-content">
                                 <h3>{{ __trans('Your cart is empty') }}</h3>
                                 <p>{{ __trans('Browse our products and add them to your cart') }}</p>
                                 <a wire:navigate href="{{ route('frontend.home') }}" class="btn btn-dark">
                                    {{ __trans('Shop Now') }}
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endif

                     @if (count($cart) > 0)
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                           <!-- column -->
                           <div class="col-12 col-lg-12">
                              <!-- Cart product list -->
                              <table class="table cart-product-table">
                                 <thead>
                                    <tr>
                                       <th scope="col" class="product-name" style="width:55%;">{{ __trans('Product') }}</th>
                                       <th scope="col" class="price">{{ __trans('Price') }}</th>
                                       <th scope="col" class="quantity-td">{{ __trans('Quantity') }}</th>
                                       <th scope="col" class="total-price">{{ __trans('TOTAL') }}</th>
                                       <th scope="col" class="remove"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($cart as $cart_key => $item)
                                    <tr wire:key="cart-item-{{ $item['product_id'].'-variation-'.$item['product_variation_id'] }}">
                                       <td class="product-name">
                                          <div class="cart-product">
                                             <div class="cart-thumb">
                                                <a href=""><img src="{{ $item['product_picture'] }}" alt=" {{ $item['product_name'] }}"></a>
                                             </div>
                                             <div class="cart-product-title">
                                                <a href="javascript:void(0)">
                                                {{ $item['product_name'] }} 
                                                @if (!empty($item['product_variation_name']))
                                                   <span class="text-muted text-xs">[{{ $item['product_variation_name'] }}]</span>
                                                @endif
                                                </a>
                                             </div>
                                          </div>
                                       </td>
                                       <td class="price">
                                          {{ __userCurrencySymbol() }} {{ $item['product_price'] }}
                                       </td>
                                       <td class="quantity-td">
                                          @livewire('quantity-selector', ['product_id' => $item['product_id'], 'product_variation_id' => $item['product_variation_id'], 'layout' => 'mini-cart-drawer', key('quantity-selector-' . $item['product_id'].'-variation-'.$item['product_variation_id'])])
                                       </td>
                                       <td class="total-price">
                                          {{ __userCurrencySymbol() }} {{ $item['product_price'] *  $item['quantity']}}
                                       </td>
                                       <td class="remove">
                                          <a x-on:click="$dispatch('remove-cart-product', { product_id: {{ $item['product_id'] }}, product_variation_id: {{ $item['product_variation_id'] ?? 0 }} })" class="remove-icon"><span class="fa fa-trash"></span></a>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                              <!-- Car footer -->
                              <div class="cart-footer" style="float: right;">
                                 <!-- Cart checkout button -->
                                 <div class="cart-checkout-button">
                                    @if (count($cart) > 0)
                                    <a wire:navigate href="{{ route('frontend.guest.checkout') }}" class="btn btn-theme">{{ __trans('Proceed to checkout') }}</a>                      
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>