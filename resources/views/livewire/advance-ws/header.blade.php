<header class="site-header header-type3">
   <div class="overflow"></div>
   <!-- Topbar -->
   <div class="topbar">
      <!-- container -->
      <div class="container">
         <!-- header-wrapper -->
         <div class="header-wrapper d-inline-flex align-items-center justify-content-between">
            <!-- Top Left -->
            <div class="column top-left d-none d-md-block">
               <!-- header-message -->
               <div class="header-followers">
                  <p>
                     <a href="{{ route('frontend.contact-us') }}"><i class="fa fa-phone"></i> {{ __trans('Contact Us') }}</a>
                  </p>
               </div>
            </div>
            <!--/ End Top Left -->
            <!-- Top center -->
            <div class="column top-left d-none d-md-block">
               <!-- header-message -->
               <div class="header-message">
                  <p>Free Express Shipping on orders $200! | <a href="{{ route('frontend.home') }}">{{ __trans('Click and Shop Now.') }}</a></p>
               </div>
            </div>
            <!--/ End center Left -->
            <!-- Top Right -->
            <div class="column top-right">
               <!-- site-nav -->
               <nav class="site-nav horizontal">
                  <ul class="menu-top-right">
                     @if (__setting('activate_multilangual_module') == '1' && __languages()->count() > 1)
                        <li class="menu-item-has-children">
                           <a href="#">{{ strtoupper(app()->getLocale()) }}</a>
                           <ul class="sub-menu">
                              @foreach(__languages() as $language)
                                    <li wire:key="language-{{ $language->id }}" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-{{ $language->id }}">
                                       <a href="{{ route('frontend.change.locale', $language->code) }}">
                                          {{ ucfirst($language->name) }}
                                       </a>
                                 </li>
                              @endforeach
                           </ul>
                        </li>
                     @endif

                     @if (__setting('activate_currencies_module') == '1' && __currencies()->count() > 1)
                        <li class="menu-item-has-children"><a href="#">{{ __userCurrencyCode() }}</a>
                           <ul class="sub-menu">
                              @foreach(__currencies() as $currency)
                                 <li wire:key="currency-{{ $currency->id }}" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-{{ $currency->id }}">
                                    <a class="flex items-center font-normal text-heading no-underline transition duration-200 hover:text-accent focus:text-accent" href="{{ route('frontend.change.currency', $currency->code) }}">
                                        {{ ucfirst($currency->code) }} ({{ ucfirst($currency->symbol) }})
                                    </a>
                                </li>
                              @endforeach
                           </ul>
                        </li>   
                     @endif
                     
                  </ul>
               </nav>
            </div>
            <!-- End Top Right -->
         </div>
      </div>
   </div>
   <!-- End Topbar -->

   <!-- Header-navbar -->
   <div class="header-row header-navbar">
      <!-- Search bar -->
      <div class="search-bar">
         <form action="#">
            <div class="form-group">
               <input type="search" name="search-field" placeholder="Search Here..." required="">
               <button type="submit"><img src="https://demo.webbytemplate.com/html-templates/bootstrap/clare-e-commerce/html/assets/images/search-icon.svg" alt="search icon"></button>
            </div>
         </form>
         <button class="close-search"><span class="ti-close"></span></button>
      </div>
      <!-- End Search bar -->
      <!-- container -->
      <div class="container">
         <!-- header-wrapper -->
         <div class="header-wrapper">
            <!-- column -->
            <div class="column left">
               <!-- site-brand -->
               <div class="site-brand">
                  <a href="{{ route('frontend.home') }}">
                     <img alt="{{ config('app.title') }}" loading="eager" decoding="async" class="object-contain app-logo-as-img" src="{{ asset(__setting('header_logo')) }}">
                  </a>
               </div>
            </div>
            <!-- column -->
            <div class="column center">
               <!-- site-nav -->
               <nav class="site-nav horizontal primary-nav">
                  <ul class="menu ">
                     <li class="menu-item"><a href="{{ route('frontend.home') }}">Shop</a></li>
                  </ul>
               </nav>
            </div>
            <!-- column -->
            <div class="column right">
               <!-- Header button right -->
               <div class="header-button-right">
                  <!-- header-button -->
                  
                  <div class="header-button">
                     <a href="javascript:;" class="search-icon"><img src="https://demo.webbytemplate.com/html-templates/bootstrap/clare-e-commerce/html/assets/images/search-icon.svg" alt="search icon"></a>
                  </div>
                  <div class="header-button">
                     <a wire:navigate href="{{ route('frontend.login') }}" class="user-icon"><img src="https://demo.webbytemplate.com/html-templates/bootstrap/clare-e-commerce/html/assets/images/user-icon.svg" alt="user icon"></a>
                  </div>
                  <div class="header-button">
                     <a wire:navigate href="{{ route('frontend.my-wishlist') }}" class="wishlist-icon"><img src="https://demo.webbytemplate.com/html-templates/bootstrap/clare-e-commerce/html/assets/images/wishlist-icon.svg" alt="wishlist icon"> <span class="count">4</span></a>
                  </div>
                  <div class="header-button">
                     @livewire('cart-icon')
                  </div>
                  <div class="header-button d-block d-md-none">
                     <a href="javascript:;" class="toggle-menu"><img src="https://demo.webbytemplate.com/html-templates/bootstrap/clare-e-commerce/html/assets/images/toggle-menu-icon.svg" alt="toggle menu icon"></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--/ End Header-navbar -->
   <!-- mini cart dropdown -->
   <div class="mini-cart-dropdown">
      <!-- mini cart close -->
      <div class="mini-cart-close">
         <a href="javascript:;"><i class="fa fa-times"></i></a>
      </div>

      <div class="cart-dropdown-wrapper">
         <!-- Order summary -->
         <div class="order-summary">
            <h3 class="account-title">Cart</h3>
            <!-- summary product list-->
            <div class="summary-product-list">
               <div class="cart-product cart-summary-product">
                  <div class="cart-thumb">
                     <a href="product-detail-1.html"><img src="https://demo.webbytemplate.com/html-templates/bootstrap/clare-e-commerce/html/assets/images/blog-img6.jpg" alt="blog img 1"></a>
                  </div>
                  <div class="cart-product-title">
                     <div class="remove">
                        <a href="javascript:;"><i class="fa fa-times"></i></a>
                     </div>
                     <h6><a href="product-detail-1.html">Micro tote bag in Faux Fur & Leather</a> </h6>
                     <div class="product-qty variation-quantity">
                        <div class="quantity">
                           <div class="quantity-button minus">-</div>
                           <input type="text" class="input-text input-qty text" name="cart[d395771085aab05244a4fb8fd91bf4ee][qty]" value="1" title="Qty" size="4" placeholder="" autocomplete="off">
                           <div class="quantity-button plus">+</div>
                        </div>
                        <div class="price">$22.22</div>
                     </div>
                  </div>
               </div>
               <div class="cart-product cart-summary-product">
                  <div class="cart-thumb">
                     <a href="product-detail-1.html"><img src="https://demo.webbytemplate.com/html-templates/bootstrap/clare-e-commerce/html/assets/images/blog-img6.jpg" alt="blog img 1"></a>
                  </div>
                  <div class="cart-product-title">
                     <div class="remove">
                        <a href="javascript:;"><i class="fa fa-times"></i></a>
                     </div>
                     <h6><a href="product-detail-1.html">Micro tote bag in Faux Fur & Leather</a></h6>
                     <div class="product-qty variation-quantity">
                        <div class="quantity">
                           <div class="quantity-button minus">-</div>
                           <input type="text" class="input-text input-qty text" name="cart[d395771085aab05244a4fb8fd91bf4ee][qty]" value="1" title="Qty" size="4" placeholder="" autocomplete="off">
                           <div class="quantity-button plus">+</div>
                        </div>
                        <div class="price">$22.22</div>
                     </div>
                  </div>
               </div>
            </div>

            <!-- mini cart button-->
            <div class="mini-cart-buttons">
               <a href="{{ route('frontend.cart') }}" class="btn btn-outline-dark">{{ __trans('View Cart') }}</a>
               <a href="{{ route('frontend.home') }}" class="btn btn-dark">{{ __trans('Continue Shopping') }}</a>
            </div>
         </div>
      </div>
   </div>
   <!-- end mini cart dropdown -->

   <!-- mobile menu -->
   <div class="mobile-menu">
      <div class="d-flex align-items-center py-2 px-3">
         <!-- site-brand -->
         <div class="site-brand">
            <a href="index.html"><img src="{{ __setting('header_logo') }}" alt="logo"></a>
         </div>
         <div class="mobile-menu-close"><a href="javascript:;"><i class="fa fa-times"></i></a></div>
      </div>
      <!-- site-nav -->
      <div class="mobile-menu-wrap">
         <nav class="site-nav horizontal primary-nav">
            <ul class="menu ">
               <li class="menu-item"><a href="{{ route('frontend.home') }}">{{ __trans('Shop') }}</a></li>
            </ul>
         </nav>
         <div class="menu-social">
            <a href="sign-in.html" class="btn btn-primary">{{ __trans('Login') }}</a>

            <p>{{ __trans('Connect with us:') }}</p>
            <ul class="social-icon">
               <li><a href="{{ __setting('facebook_link') }}" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
               <li><a href="{{ __setting('instagram_link') }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
               <li><a href="{{ __setting('twitter_link') }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
            </ul>
         </div>
      </div>
   </div>
</header>