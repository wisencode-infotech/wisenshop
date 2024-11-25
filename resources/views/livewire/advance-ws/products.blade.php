<div>
    <div class="filter-shop-loop">
        <div class="d-flex w-100 mb-3 mb-md-0 justify-content-between align-items-center">
            <p class="shop-result-count"></p>
            <a class="filter-mobile-btn text-dark fw-medium d-flex align-items-center d-md-none">
                <span class="ti-filter me-1"></span> Filter
            </a>
        </div>                 
    </div>

    @if(count($products) == 0)

    <div class="d-flex flex-column align-items-center mx-auto bg-light p-4 no-product-found-box">
        <div class="w-100 h-100 d-flex align-items-center justify-content-center">
          <img 
            alt="{{ __trans('Oops! No relevant product found') }}" 
            loading="lazy" 
            width="200" 
            height="153" 
            decoding="async" 
            class="img-fluid" 
            src="{{ asset('assets/frontend/img/no-product-found.png') }}" 
            style="color: transparent;">
        </div>
        <h3 class="w-100 text-center mt-4 text-secondary">
          {{ __trans('Oops! No relevant product found') }}
        </h3>
      </div>

    @else

        <!-- Loading Skeleton -->
        <div wire:loading wire:target.except="loadMore" class="w-full"> 
            {!! 
                __appLivewireViewInclude('skeleton-loader', [
                    'skeletons' => range(1, 10) // Pass the skeleton count to the view
                ])
            !!}
        </div>

        <div class="row">
            @foreach ($products as $product)
            <div wire:key="product-{{ $product->id }}" class="col-12 col-sm-6 col-md-4 col-lg-3" wire:loading.remove wire:target.except="loadMore">
                <div class="product product-style-3">
                    <div class="product-thumbnail" wire:key="product-{{ $product->id }}">
                        <a href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}" class="thumbnail">
                            <img 
                            alt="{{ $product->name }}" 
                            loading="lazy" 
                            decoding="async" 
                            data-nimg="fill"
                            wire:navigate href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}"
                            src="{{ $product->display_image_url }}" >
                        </a>

                        <div class="product-badges">
                            @livewire('wishlist-button', ['product_id' => $product->id, key($product->id)])
                        </div>

                        <div class="product-hover-button">
                            <a href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}" class="select-option-btn"><i class="fa fa-shopping-cart cart me-2"></i> {{ __trans('Add to cart') }}</a>
                        </div>
                    </div>
                    <div class="product-content">
                        <!-- product tile -->
                        <h3 class="product-title">
                            <a href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}">{{ $product->name }}</a>
                        </h3>
                        <h6 class="text-muted mt-2">
                            <a href="#">{{ $product->category->name }}</a>
                        </h6>
                        <!-- product price -->
                        <span class="price">
                            @livewire('product-price', ['product_id' => $product->id], key('product-price-' . $product->id), ['lazy' => true])
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

        @if ($products->hasMorePages())
            <div class="section-full-btn">
                <!-- Default Button Text -->
                <button wire:click="loadMore" wire:loading.attr="disabled"  data-variant="normal"
                    class="btn btn-theme btn-style-2">
                    <span wire:loading.remove wire:target="loadMore">{{ __trans('Load More') }}</span>
                    <span wire:loading wire:target="loadMore">{{ __trans('Loading...') }}</span>
                </button>
            </div>
        @endif

        </div>
        
    @endif
</div>

