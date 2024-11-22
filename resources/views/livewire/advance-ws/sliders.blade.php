<div x-data="{
    initializeMainSwiper() {
        var swiper = new Swiper('.mySwiper', {
            cssMode: true,
            navigation: {
                nextEl: '.swiper-container .next',
                prevEl: '.swiper-container .prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            mousewheel: true,
            keyboard: true,
            slidesPerView: 1,
            spaceBetween: 10,
            lazy: true,
            breakpoints: {
                640: { slidesPerView: 1, spaceBetween: 10 },
                768: { slidesPerView: 1, spaceBetween: 20 },
                1024: { slidesPerView: 1, spaceBetween: 30 },
            },
        });
    }
}" 
x-init="initializeMainSwiper()">

<div class="border-top border-light bg-light p-1">
    <div class="swiper-container position-relative">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($banners as $banner_key => $banner)
                    <div wire:key="banner-{{ $banner->id }}" class="swiper-slide">
                        <div class="card h-100 border-0">
                            <img 
                                alt="{{ $banner->title }}" 
                                loading="lazy" 
                                class="card-img-top" 
                                src="{{ $banner->image_url }}" 
                                style="object-fit: cover;">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Navigation buttons -->
        <button class="next swiper-slider-btn position-absolute top-50 end-0 translate-middle-y shadow z-40" aria-label="Next">
            <span class="visually-hidden">Next</span>
            <i class="fa fa-chevron-right"></i>
        </button>
        <button class="prev swiper-slider-btn position-absolute top-50 start-0 translate-middle-y shadow z-40" aria-label="Previous">
            <span class="visually-hidden">Previous</span>
            <i class="fa fa-chevron-left"></i>
        </button>
    </div>
</div>
</div>