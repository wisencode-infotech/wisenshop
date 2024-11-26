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
                  <p>{{ __trans('Free Express Shipping on orders $200!')}} | <a href="{{ route('frontend.home') }}">{{ __trans('Click and Shop Now.') }}</a></p>
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
                           <a href="javascript:void(0)">{{ strtoupper(app()->getLocale()) }}</a>
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
                        <li class="menu-item-has-children"><a href="javascript:void(0)">{{ __userCurrencyCode() }}</a>
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
        <livewire:product-search-bar />
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
                     <li class="menu-item"><a href="{{ route('frontend.home') }}">{{ __trans('Shop') }}</a></li>
                  </ul>
               </nav>
            </div>
            <!-- column -->
            <div class="column right">
               <!-- Header button right -->
               <div class="header-button-right">
                  <!-- header-button -->
                  
                  <div class="header-button">
                     <a href="javascript:;" class="search-icon">
                        <img src="{{ __activeThemeStaticImgMediaAsset('search-icon.svg') }}" alt="search icon"></a>
                  </div>
                  <div class="header-button">
                     <a wire:navigate href="{{ route('frontend.login') }}" class="user-icon">
                        <img src="{{ __activeThemeStaticImgMediaAsset('user-icon.svg') }}" alt="user icon">
                     </a>
                  </div>
                  <div class="header-button">
                     <a wire:navigate href="{{ route('frontend.my-wishlist') }}" class="wishlist-icon">
                        <img src="{{ __activeThemeStaticImgMediaAsset('wishlist-icon.svg') }}" alt="wishlist icon"> 
                     </a>
                  </div>
                  <div class="header-button">
                     @livewire('cart-icon')
                  </div>
                  <div class="header-button d-block d-md-none">
                     <a href="javascript:;" class="toggle-menu">
                        <img src="{{ __activeThemeStaticImgMediaAsset('toggle-menu-icon.svg') }}" alt="toggle menu icon">
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--/ End Header-navbar -->
   <!-- mini cart dropdown -->
   <livewire:mini-cart-dropdown />
   <!-- end mini cart dropdown -->

   <!-- mobile menu -->
   <div class="mobile-menu">
      <div class="d-flex align-items-center py-2 px-3">
         <!-- site-brand -->
         <div class="site-brand">
            <a href="index.html"><img src="{{ asset(__setting('header_logo')) }}" alt="logo" style="width: 150px;"></a>
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
            <a href="sign-in.html" class="btn btn-dark btn-style-2">{{ __trans('Login') }}</a>

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