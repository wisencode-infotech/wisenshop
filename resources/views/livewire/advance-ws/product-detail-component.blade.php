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
                        <p class="people-viewing"><i class="fa-solid fa-eye"></i> {{ rand(1,99) }} people are viewing this right now
                        </p>

                        @if ($product->variations()->count() > 0)
                            <div class="mt-6 flex flex-col items-center md:mt-6 lg:flex-row">
                                @livewire('product-variation', ['product_id' => $product->id])
                            </div>
                        @endif

                        <!-- variation add to cart -->
                        <div class="variation-add-to-cart">
                            <!-- Quantity -->
                            <div class="variation-quantity">
                                <label class="label-title">{{ __trans('Quantity') }}:</label>
                                <!-- Quantity -->
                                @livewire('quantity-selector', ['product_id' => $product->id, 'layout' => 'small'])
                            </div>
                            <div class="single-add-to-cart">
                                <button type="button"
                                    class="single_add_to_cart_button btn btn-dark btn-outline-dark" wire:click="addToCartButtonProcess">{{ __trans('Add to cart') }}</button>
                            </div>
                        </div>
                        <div class="buy-product-button">
                            <a href="cart.html" class="buy-product-btn btn btn-dark">Buy Now</a>
                        </div>

                        <!-- product extra buttons-->
                        <div class="product-extra-buttons">
                        </div>

                        <!-- product meta -->
                        <div class="product-meta">
                            <div class="product-meta-list">
                                <span>Estimated Delivery: </span>
                                <span class="meta">Jan 31 - 07 Feb, 2023</span>
                            </div>
                            <div class="product-meta-list">
                                <span>Free Shipping & Returns:</span>
                                <span class="meta">On all orders over $200.00</span>
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
                            <li class="active" data-tab="tab-description">Description</li>
                            <li data-tab="tab-information">Additional Information</li>
                            <li data-tab="tab-reviews">Reviews (0)</li>
                            <li data-tab="tab-questions">Questions</li>
                        </ul>

                        <!-- tabs entry content -->
                        <div id="tab-description" class="tabs-entry-content active">
                            <p>
                                {!! $product->description !!}
                            </p>
                            <ul>
                                <li>Imperdiet dui accumsan</li>
                                <li>Sit amet est placerat in egestas. </li>
                                <li>Enim diam vulputate ut </li>
                                <li>pharetra sit amet aliquam id diam</li>
                                <li>Sit amet nisl purus in </li>
                                <li>mollis nunc sed</li>
                            </ul>
                        </div>
                        <!-- tabs entry content -->
                        <div id="tab-information" class="tabs-entry-content">
                            <ul class="product_features">
                                <li><b>Size Available:</b> M, L, Xl, XXL</li>
                                <li><b>Color:</b> Blue</li>
                                <li><b>Brand:</b> Gucci</li>
                                <li><b>Quality:</b> 100% Cotton</li>
                            </ul>
                        </div>
                        <!-- tabs entry content -->
                        <div id="tab-reviews" class="tabs-entry-content">
                            <div class="row client-review-header align-items-center gx-0">
                                <div class="col-md-8">
                                    <h2>Customer Reviews</h2>
                                    <ul class="ratings list-style">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                    <p>Based on 2 Reviews</p>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <a href="#cmt-form" class="btn btn-primary">Write A Review</a>
                                </div>
                            </div>
                            <div class="client-review">
                                <div class="comment-item-wrap">
                                    <div class="comment-item d-flex flex-wrap">
                                        <div class="comment-author-img">
                                            <img src="assets/images/best-sellers-img7.jpg" alt="Image">
                                        </div>
                                        <div class="comment-author-wrap">
                                            <div class="comment-author-info">
                                                <div class="row align-items-start">
                                                    <div
                                                        class="col-md-7 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                                                        <div class="comment-author-name">
                                                            <h5>Olivic Dsuza</h5>
                                                            <span class="comment-date">Jun 22, 2022 | 7:10 PM</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-5 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-3">
                                                        <a href="#cmt-form" class="reply-btn">Report As
                                                            Inappropriate</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-text">
                                            <p>Voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                                                dicta sunt explicabo. Nemo enim ipsam tatem quia voluptas sit aspernatur
                                                aut odit aut dolore magna aliqua ipsum insididunt labore magna white.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="comment-item d-flex flex-wrap">
                                        <div class="comment-author-img">
                                            <img src="assets/images/best-sellers-img4.jpg" alt="Image">
                                        </div>
                                        <div class="comment-author-wrap">
                                            <div class="comment-author-info">
                                                <div class="row align-items-start">
                                                    <div
                                                        class="col-md-7 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                                                        <div class="comment-author-name">
                                                            <h5>Michel Jackson</h5>
                                                            <span class="comment-date">Jun 22, 2022 | 7:10 PM</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-5 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-3">
                                                        <a href="#cmt-form" class="reply-btn">Report As
                                                            Inappropriate</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-text">
                                                <p>Voluptatem accusantium doloremque laudantium, totam rem aperiam,
                                                    eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                    beatae vitae dicta sunt explicabo. Nemo enim ipsam tatem quia
                                                    voluptas sit aspernatur aut odit aut dolore magna aliqua ipsum
                                                    insididunt labore magna white.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="cmt-form" class="client-form">
                                    <div class="comment-box-title mb-25">
                                        <h4>Write Your Review</h4>
                                    </div>
                                    <form action="#" class="comment-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="name" id="name"
                                                        required="" placeholder="Your Name*">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email"
                                                        required="" placeholder="Email Address*">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="url" name="website" id="website"
                                                        placeholder="Website">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea name="messages" id="messages" cols="30" rows="10"
                                                        placeholder="Please Enter Your Comment Here"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <button class="btn btn-dark btn-style-2">Post A Review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- tabs entry content -->
                        <div id="tab-questions" class="tabs-entry-content">
                            <div class="accordion">
                                <!-- accordion list -->
                                <div class="accordion-list">
                                    <!-- accordion title -->
                                    <h4 class="accordion-title active">Shipping destinations</h4>
                                    <!-- accordion content -->
                                    <div class="accordion-content actives">
                                        <p>For now we ship to the following countries: Austria, Belgium, Czech Republic,
                                            Lithuania, Luxembourg, Latvia, Slovakia, Hungary, Bulgaria, Romania,
                                            Slovenia, Finland, Denmark, Estonia, Netherlands, Germany, France, Great
                                            Britain, Croatia, Ireland, Sweden, Italy, Greece, Spain, Portugal and
                                            Poland.</p>
                                    </div>
                                </div>
                                <!-- accordion list -->
                                <div class="accordion-list">
                                    <!-- accordion title -->
                                    <h4 class="accordion-title">Shipping times</h4>
                                    <!-- accordion content -->
                                    <div class="accordion-content">
                                        <p>For now we ship to the following countries: Austria, Belgium, Czech Republic,
                                            Lithuania, Luxembourg, Latvia, Slovakia, Hungary, Bulgaria, Romania,
                                            Slovenia, Finland, Denmark, Estonia, Netherlands, Germany, France, Great
                                            Britain, Croatia, Ireland, Sweden, Italy, Greece, Spain, Portugal and
                                            Poland.</p>
                                    </div>
                                </div>
                                <!-- accordion list -->
                                <div class="accordion-list">
                                    <!-- accordion title -->
                                    <h4 class="accordion-title">Tracking your parcel</h4>
                                    <!-- accordion content -->
                                    <div class="accordion-content">
                                        <p>For now we ship to the following countries: Austria, Belgium, Czech Republic,
                                            Lithuania, Luxembourg, Latvia, Slovakia, Hungary, Bulgaria, Romania,
                                            Slovenia, Finland, Denmark, Estonia, Netherlands, Germany, France, Great
                                            Britain, Croatia, Ireland, Sweden, Italy, Greece, Spain, Portugal and
                                            Poland.</p>
                                    </div>
                                </div>
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
                    <h2 class="entry-title">Related products</h2>
                </div>
                <livewire:products lazy :category_id="$product->category_id" :exclude_product_ids="[$product->id]" :from_page="'product_detail'" />
            </div>
        </div>
    </section>
</div>
