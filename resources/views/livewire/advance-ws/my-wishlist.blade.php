@section('title', __trans('Wishlist'))

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
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">{{ __trans('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __trans('Wishlist') }}</li>
                     </ol>
                  </nav>
                  <!-- page title -->
                  <h1>{{ __trans('Wishlist') }}</h1>

                  <!-- heading banner img -->
                  <div class="heading-banner-img">
                     <!-- <img src="assets/images/heading-banner-img.png" alt="heading banner img"> -->
                  </div>
               </div>
            </div>
         </div>
      </div>

   </section>

   <section class="wishlist-grid-section style-3  section-two">
      <!-- container -->
      <div class="container">
         <!-- row -->
         <div class="row">

         @if (count($wishlist_products) == 0)
            <div class="d-flex flex-column align-items-center mx-auto bg-light p-4 no-product-found-box">
               
               <i class="fa fa-heart text-muted text-xl"></i>
               <h3 class="text-center mt-4 text-secondary">{{ __trans('Your wishlist is empty') }}</h3>
               <p class="mt-1">{{ __trans('Browse our products and add them to your wishlist') }}</p>

               <a wire:navigate href="{{ route('frontend.home') }}" class="mt-4 btn btn-theme">
                  {{ __trans('Shop Now') }}
               </a>
            </div> 
         @endif

         @foreach($wishlist_products as $product)
            <div wire:loading.flex class="fixed inset-0 z-10 flex items-center justify-center bg-accent-400 bg-opacity-10">
               <div class="loader"></div>
            </div>

            <div class="col-12">
               <!-- Product -->
               <div class="product product-list-grid">
                  <!-- Product close icon -->
                  <a wire:click="removeFromWishlist({{ $product->product_id }},{{ $product->product_variation_id ?? null }})" class="product-close-icon"><span class="fa fa-close"></span></a>
                  <!-- product thumbnail -->
                  <div class="product-thumbnail">
                     <a href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}" class="thumbnail"><img src="{{ $product->display_image_url }}" alt="{{ $product->name }}"></a>

                     <!-- -->
                     <div class="product-badges">
                        <span class="badge  onsale">
                           @if ($product->average_rating > 0)
                           <span>
                              {{ $product->average_rating }}
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.056 24" style="width: 10px;">
                                 <g data-name="Group 36413" fill="currentColor">
                                    <path id="Path_22667" data-name="Path 22667" d="M19.474,34.679l-6.946-4.346L5.583,34.679a.734.734,0,0,1-1.1-.8L6.469,25.93.263,20.668a.735.735,0,0,1,.421-1.3l8.1-.566,3.064-7.6a.765.765,0,0,1,1.362,0l3.064,7.6,8.1.566a.735.735,0,0,1,.421,1.3L18.588,25.93l1.987,7.949a.734.734,0,0,1-1.1.8Z" transform="translate(0 -10.792)"></path>
                                 </g>
                              </svg>  
                           </span>
                           @endif
                        </span>
                     </div>
                  </div>
                  <!-- product content -->
                  <div class="product-content">
                     <!-- product tile -->
                     <h3 class="product-title">
                        <a href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}">{{ $product->name }}</a>
                     </h3>
                     <!-- product price -->
                     <span class="price"><ins>{{ __userCurrencySymbol().''.$product->price }}</ins></span>
                     <!-- entry description -->
                     <div class="entry-description">
                        <!-- <p>{{ $product->short_description ?? '' }}</p> -->
                     </div>
                     <!-- Product list button -->
                     <div class="product-list-buttons">
                        <div class="add_to_cart_button">
                           <button wire:click="addToCart({{ $product->product_id }},{{ $product->product_variation_id ?? null }})" class="btn btn-dark">{{ __trans('Add to Cart') }}</button>
                        </div>
                        <!-- product buttons icon-->
                        <div class="product-buttons-icon">
                           <a href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}" class="arrow-icon"><span class="fa fa-eye"></span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
</div>