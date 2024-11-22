<div>
    <div class="filter-shop-loop">
        <div class="d-flex w-100 mb-3 mb-md-0 justify-content-between align-items-center">
            <p class="shop-result-count">Showing 12 of 1222 results</p>
            <a class="filter-mobile-btn text-dark fw-medium d-flex align-items-center d-md-none">
                <span class="ti-filter me-1"></span> Filter
            </a>
        </div>                 
    </div>

    @if(count($products) == 0)

        <div class="flex flex-col items-center mx-auto bg-light p-4 no-product-found-box">
            <div class="w-full h-full flex items-center justify-center">
                <img alt="{{ __trans('Oops! No relevant product found') }}" loading="lazy" width="200" height="153" decoding="async" data-nimg="1" class="object-contain" src="{{ asset('assets/frontend/img/no-product-found.png') }}" style="color: transparent;">
            </div>
            <h3 class="w-full text-center text-sm font-semibold text-body mt-7 text-gray-500">{{ __trans('Oops! No relevant product found') }}</h3>
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
            <div class="col-12 col-sm-6 col-md-4 col-lg-3" wire:loading.remove wire:target.except="loadMore">
                <div class="product product-style-3">
                    <div class="product-thumbnail" wire:key="product-{{ $product->id }}">
                        <a href="product-detail-1.html" class="thumbnail">
                            <img 
                            alt="{{ $product->name }}" 
                            loading="lazy" 
                            decoding="async" 
                            data-nimg="fill"
                            wire:navigate href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}"
                            src="{{ $product->display_image_url }}" >
                        </a>

                        <div class="product-badges d-none">
                            <span class="badge  onsale">-15%</span>
                        </div>

                        <div class="product-hover-button">
                            <a href="{{ route('frontend.product-detail', ['product_slug' => $product->slug]) }}" class="select-option-btn">More...</a>
                        </div>

                        <div class="product-buttons-icon">
                            <a href="#product-quick-popup" class="arrow-icon quick-view-link"><span class="ti-eye"></span></a>
                            <a href="#" class="arrow-icon"><span class="ti-shopping-cart"></span></a>
                            @livewire('wishlist-button', ['product_id' => $product->id, key($product->id)])
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
                    class="btn btn-dark btn-style-2">
                    <span wire:loading.remove wire:target="loadMore">{{ __trans('Load More') }}</span>
                    <span wire:loading wire:target="loadMore">{{ __trans('Loading...') }}</span>
                </button>
            </div>
        @endif

        </div>
        
    @endif
</div>

