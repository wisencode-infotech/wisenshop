<div>
    <div class="border-t border-border-200 bg-light px-5 py-5 md:p-8 lg:px-6">
        <div class="swiper-container relative">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($banners as $banner_key => $banner)
                    <div class="swiper-slide">
                        <div class="banner-slide-content" style="background-image: url({{ $banner->image_url  }});">
                            <h2 class="banner-title">{{ $banner->title }}</h2>
                            <p class="banner-description">{{ $banner->description }}</p>
                        </div>
                    </div>
                    @endforeach
                    @foreach($banners as $banner_key => $banner)
                    <div class="swiper-slide">
                        <div class="banner-slide-content" style="background-image: url({{ $banner->image_url  }});">
                            <h2 class="banner-title">{{ $banner->title }}</h2>
                            <p class="banner-description">{{ $banner->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="next absolute top-2/4 z-10 -mt-4 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full border border-border-200 border-opacity-70 bg-light text-heading shadow-xl transition-all duration-200 hover:border-accent hover:bg-accent hover:text-light ltr:-right-4 rtl:-left-4 md:-mt-5 md:h-9 md:w-9 ltr:md:-right-5 swiper-button-disabled" role="button"><span class="sr-only">Next</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18">
                    <path d="M294.1 256L167 129c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.3 34 0L345 239c9.1 9.1 9.3 23.7.7 33.1L201.1 417c-4.7 4.7-10.9 7-17 7s-12.3-2.3-17-7c-9.4-9.4-9.4-24.6 0-33.9l127-127.1z" fill="currentColor" stroke="currentColor"></path>
                </svg></div>
            <div class="prev absolute top-2/4 z-10 -mt-4 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full border border-border-200 border-opacity-70 bg-light text-heading shadow-xl transition-all duration-200 hover:border-accent hover:bg-accent hover:text-light ltr:-left-4 rtl:-right-4 md:-mt-5 md:h-9 md:w-9 ltr:md:-left-5 rtl:md:-right-5" role="button"><span class="sr-only">Previous</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18">
                    <path d="M217.9 256L345 129c9.4-9.4 9.4-24.6 0-33.9-9.4-9.4-24.6-9.3-34 0L167 239c-9.1 9.1-9.3 23.7-.7 33.1L310.9 417c4.7 4.7 10.9 7 17 7s12.3-2.3 17-7c9.4-9.4 9.4-24.6 0-33.9L217.9 256z" fill="currentColor" stroke="currentColor"></path>
                </svg></div>
        </div>
        
    </div>