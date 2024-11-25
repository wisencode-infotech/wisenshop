<div x-data="{ initializeProductImageSlider() { 
    var productGalleryThumbs = new Swiper('#productGalleryThumbs', {
        spaceBetween: 5,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        direction: 'vertical',
     });

     var productGallery = new Swiper('#productGallery', {
        spaceBetween: 0,
        navigation: {
          nextEl: '.product-gallery-vertical .swiper-button-next',
          prevEl: '.product-gallery-vertical .swiper-button-prev',
        },
        thumbs: {
          swiper: productGalleryThumbs,
        },
     });
} }" x-init="initializeProductImageSlider()">
    <!-- Product detail page section -->
    <section class="product-detail-page section-two">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- column -->
                <div class="col-12 col-lg-6">
                    <!-- product gallery column -->
                    <div class="product-gallery-column">
                        <div class="product-gallery-vertical">
                            <div class="swiper mySwiper2 big-gallery" id="productGallery">
                                <div class="swiper-wrapper">
                                    @if($product->images->isEmpty())
                                        <!-- If no product images are available, show the default image -->
                                        <div class="swiper-slide">
                                            <div class="full-product-img"><img src="{{ $product->display_image_url }}" loading="lazy" alt="product img"></div>
                                        </div>
                                    @else
                                        <!-- If product images are available, loop through them -->
                                        @foreach($product->images as $image)
                                            <div class="swiper-slide">
                                                <div class="full-product-img"><img src="{{ $image->image_url }}" loading="lazy" alt="product img"></div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @foreach($product->images as $image)
                                        <div class="swiper-slide">
                                            <div class="full-product-img"><img src="{{ $image->image_url }}" loading="lazy" alt="product img"></div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"><span class="ti-arrow-right"></span></div>
                                <div class="swiper-button-prev"><span class="ti-arrow-left"></span></div>
                            </div>

                            <div class="swiper mySwiper thumbs-gallery" id="productGalleryThumbs">
                                <div class="swiper-wrapper">
                                    @foreach($product->images as $image)
                                        <div class="swiper-slide">
                                            <div class="thumbs"><img src="{{ $image->image_url }}" loading="lazy" alt="product img"></div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column -->
                <div class="col-12 col-lg-6">
                    <!-- product info -->
                    <div class="product-info">
                        <h2 class="product_title">{{ $product->name }}</h2>
                        <div class="price">
                            @livewire('product-price', ['product_id' => $product->id])
                        </div>
                        <p class="people-viewing"><i class="fa-solid fa-info-circle"></i> {{ $product->short_description }}
                        </p>

                        @if ($product->variations()->count() > 0)
                            <div class="mt-6 flex flex-col items-center md:mt-6 lg:flex-row">
                                @livewire('product-variation', ['product_id' => $product->id])
                            </div>
                        @endif

                        
                        @livewire('quantity-selector', ['product_id' => $product->id, 'layout' => 'product-details'])

                        <!-- product extra buttons-->
                        <div class="product-extra-buttons">
                        </div>

                        <!-- product meta -->
                        <div class="product-meta">
                            <div class="product-meta-list">
                                @livewire('product-stock', ['product_id' => $product->id, 'layout' => 'product-detail'])
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- row -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="wc-tabs-wrapper">
                        <!-- Product tabs -->
                        <ul class="tabs wc-tabs">
                            <li class="active" data-tab="tab-description">{{ __trans('Description') }}</li>
                            <li data-tab="tab-reviews">{{ __trans('Reviews') }} ({{ $product->total_reviews }})</li>
                        </ul>

                        <!-- tabs entry content -->
                        <div id="tab-description" class="tabs-entry-content active">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                        <!-- tabs entry content -->
                        <div id="tab-reviews" class="tabs-entry-content">
                            <div class="row client-review-header align-items-center gx-0">
                                <div class="col-md-8">
                                    <h2>{{ __trans('Customer Reviews') }}</h2>
                                    <ul class="ratings list-style">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if($i <= $product->average_rating)
                                            <li><i class="fas fa-star"></i></li>
                                            @else
                                            <li><i class="far fa-star"></i></li>
                                            @endif
                                        @endfor
                                    </ul>
                                    <p>{{ __trans('Based on') }} {{ $product->total_reviews }} {{ __trans('Reviews') }}</p>
                                </div>
                                {{-- <div class="col-md-4 text-md-end">
                                    <a href="#cmt-form" class="btn btn-primary">{{ __trans('Write A Review') }}</a>
                                </div> --}}
                            </div>
                            <div class="client-review">
                                <div class="comment-item-wrap">
                                    <livewire:product-reviews lazy :product_id="$product->id" />
                                </div>
                                {{-- <div id="cmt-form" class="client-form">
                                    <div class="comment-box-title mb-25">
                                        <h4>{{ __trans('Write Your Review') }}</h4>
                                    </div>
                                    <form action="#" class="comment-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="name" id="name"
                                                        required="" placeholder="{{ __trans('Your Name') }}*">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email"
                                                        required="" placeholder="{{ __trans('Email Address') }}*">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="url" name="website" id="website"
                                                        placeholder="{{ __trans('Website') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea name="messages" id="messages" cols="30" rows="10"
                                                        placeholder="{{ __trans('Please Enter Your Comment Here') }}"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <button class="btn btn-dark btn-style-2">{{ __trans('Post A Review') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Product detail page section -->

    <!-- related products section -->
    <section class="related-products-section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <h2 class="entry-title">{{ __trans('Related products') }}</h2>
                </div>
                <livewire:products lazy :category_id="$product->category_id" :exclude_product_ids="[$product->id]" :from_page="'product_detail'" />
            </div>
        </div>
    </section>
</div>