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
                  <p><a href="#" class="me-2"><i class="fa-brands fa-instagram"></i> 399k Followers</a><a href="mailto:{{ __setting('email') }}" class="mail-link">{{ __setting('email') }}</a></p>
               </div>
            </div>
            <!--/ End Top Left -->
            <!-- Top center -->
            <div class="column top-left d-none d-md-block">
               <!-- header-message -->
               <div class="header-message">
                  <p>Free Express Shipping on orders $200! | <a href="shop.html">Click and Shop Now.</a></p>
               </div>
            </div>
            <!--/ End center Left -->
            <!-- Top Right -->
            <div class="column top-right">
               <!-- site-nav -->
               <nav class="site-nav horizontal">
                  <ul class="menu-top-right">
                     <li class="menu-item-has-children"><a href="#">English</a>
                        <ul class="sub-menu">
                           <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2498"><a href="#">English</a></li>
                           <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2497"><a href="#">Spanish</a></li>
                           <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2499"><a href="#">German</a></li>
                        </ul>
                     </li>
                     <li class="menu-item-has-children"><a href="#">USD</a>
                        <ul class="sub-menu">
                           <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2498"><a href="#">USD</a></li>
                           <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2497"><a href="#">INR</a></li>
                           <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2499"><a href="#">GBP</a></li>
                        </ul>
                     </li>
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
                  <a href="index-three.html">
                     <img alt="{{ config('app.title') }}" loading="eager" decoding="async" class="object-contain app-logo-as-img" src="{{ asset(__setting('header_logo')) }}">
                  </a>
               </div>
            </div>
            <!-- column -->
            <div class="column center">
               <!-- site-nav -->
               <nav class="site-nav horizontal primary-nav">
                  <ul class="menu ">
                     <li class="menu-item"><a href="shop.html">Shop</a></li>
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
                     <a href="wishlist.html" class="wishlist-icon"><img src="https://demo.webbytemplate.com/html-templates/bootstrap/clare-e-commerce/html/assets/images/wishlist-icon.svg" alt="wishlist icon"> <span class="count">4</span></a>
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
         <a href="javascript:;"><i class="fa-regular fa-xmark"></i></a>
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
                        <a href="javascript:;"><i class="fa-regular fa-xmark"></i></a>
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
                        <a href="javascript:;"><i class="fa-regular fa-xmark"></i></a>
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
               <a href="cart.html" class="btn btn-outline-dark">View Cart</a>
               <a href="shop.html" class="btn btn-dark">Continue Shopping</a>
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
            <a href="index.html"><img src="https://demo.webbytemplate.com/html-templates/bootstrap/clare-e-commerce/html/assets/images/logo-dark.svg" alt="logo"></a>
         </div>
         <div class="mobile-menu-close"><a href="javascript:;"><i class="fa-regular fa-xmark"></i></a></div>
      </div>
      <!-- site-nav -->
      <div class="mobile-menu-wrap">
         <nav class="site-nav horizontal primary-nav">
            <ul class="menu ">
               <li class="menu-item menu-item-has-children active">
                  <a href="index.html">Home</a>
                  <ul class="sub-menu">
                     <li><a href="index.html">Home V1</a></li>
                     <li><a href="index-two.html">Home V2</a></li>
                     <li class="active"><a href="index-three.html">Home V3</a></li>
                  </ul>
               </li>
               <li class="menu-item"><a href="shop.html">Shop</a></li>
               <li class="menu-item mega-menu menu-item-has-children">
                  <a href="javascript:;">Pages</a>

                  <!-- Sub mega menu -->
                  <ul class="sub-mega-menu">
                     <li>
                        <ul class="sub-menu">
                           <li>
                              <ul class="sub-menu-wrap">
                                 <li><a href="shop.html">Shop Pages</a>
                                    <ul>
                                       <li><a href="shop-list.html">Shop List</a></li>
                                       <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                       <li><a href="category.html">Category</a></li>
                                    </ul>
                                 </li>
                                 <li>
                                    <a href="shop.html">Product Detail Pages</a>
                                    <ul>
                                       <li><a href="product-detail-1.html">Product Detail 1</a></li>
                                       <li><a href="product-detail-2.html">Product Detail 2</a></li>
                                       <li><a href="product-detail-3.html">Product Detail 3</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <li>
                              <a href="shop.html">Account Pages</a>
                              <ul>
                                 <li><a href="cart.html">Cart</a></li>
                                 <li><a href="checkout.html">Checkout</a></li>
                                 <li><a href="compare.html">Compare</a></li>
                                 <li><a href="wishlist.html">Wishlist</a></li>
                                 <li><a href="thank-you.html">Thank You</a></li>
                                 <li><a href="shop-list.html">Shop List</a></li>
                                 <li><a href="faq.html">Faq</a></li>
                                 <li><a href="site-map.html">Site Map</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="blog-grid.html">Blog Pages</a>
                              <ul>
                                 <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                                 <li><a href="blog-classic.html">Blog Classic</a></li>
                                 <li><a href="blog-detail.html">Blog Detail</a></li>
                                 <li><a href="blog-detail-full.html">Blog Detail Full</a></li>
                                 <li><a href="blog-detail-left-sidebar.html">Blog Detail Left Sidebar</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li class="menu-item"><a href="about-us.html">About</a></li>
               <li class="menu-item"><a href="blog-grid.html">Blog</a></li>
               <li class="menu-item"><a href="contact-us.html">Contact</a></li>
            </ul>
         </nav>
         <div class="menu-social">
            <a href="sign-in.html" class="btn btn-primary">Login</a>

            <p>Connect with us:</p>
            <ul class="social-icon">
               <li><a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
               <li><a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
               <li><a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
            </ul>
         </div>
      </div>
   </div>
</header>