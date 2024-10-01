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
        <div class="sticky z-20 flex h-14 items-center justify-between border-t border-b border-border-200 bg-light py-3 px-5 md:h-16 lg:px-6 xl:hidden top-[58px] lg:top-[84px]"><button class="flex h-8 items-center rounded border border-border-200 bg-gray-100 bg-opacity-90 py-1 px-3 text-sm font-semibold text-heading transition-colors duration-200 hover:border-accent-hover hover:bg-accent hover:text-light focus:border-accent-hover focus:bg-accent focus:text-light focus:outline-0 md:h-10 md:py-1.5 md:px-4 md:text-base"><svg width="18" height="14" class="ltr:mr-2 rtl:ml-2" viewBox="0 0 18 14">
                    <path d="M942.581,1295.564H925.419c-.231,0-.419-.336-.419-.75s.187-.75.419-.75h17.163c.231,0,.419.336.419.75S942.813,1295.564,942.581,1295.564Z" transform="translate(-925 -1292.064)" fill="currentColor"></path>
                    <path d="M942.581,1951.5H925.419c-.231,0-.419-.336-.419-.75s.187-.75.419-.75h17.163c.231,0,.419.336.419.75S942.813,1951.5,942.581,1951.5Z" transform="translate(-925 -1939.001)" fill="currentColor"></path>
                    <path d="M1163.713,1122.489a2.5,2.5,0,1,0,1.768.732A2.483,2.483,0,0,0,1163.713,1122.489Z" transform="translate(-1158.213 -1122.489)" fill="currentColor"></path>
                    <path d="M2344.886,1779.157a2.5,2.5,0,1,0,.731,1.768A2.488,2.488,0,0,0,2344.886,1779.157Z" transform="translate(-2330.617 -1769.425)" fill="currentColor"></path>
                </svg>Filter</button>
            <div class="relative inline-block ltr:text-left rtl:text-right" data-headlessui-state=""><button class="flex h-11 shrink-0 items-center text-sm font-semibold text-heading focus:outline-0 md:text-[15px] xl:px-4 rounded border-border-200 bg-light xl:min-w-150 xl:border xl:text-accent" id="headlessui-menu-button-:Rpp4m:" type="button" aria-haspopup="menu" aria-expanded="false" data-headlessui-state=""><span class="flex h-5 w-5 items-center justify-center ltr:mr-2 rtl:ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="20.347" height="24.101" viewBox="0 0 20.347 24.101" fill="currentColor" class="max-h-full max-w-full">
                            <g id="Grocery" transform="translate(-39.481 0.052)">
                                <path id="Path_17386" data-name="Path 17386" d="M349.261,399.988a.469.469,0,1,1,.461-.385A.473.473,0,0,1,349.261,399.988Z" transform="translate(-294.289 -380.346)" fill="currentColor" stroke="currentColor" stroke-width="0.1"></path>
                                <path id="Path_17387" data-name="Path 17387" d="M58.743,8.638A6.2,6.2,0,0,0,55.4,6.3a6.662,6.662,0,0,0-3.058.055h0l-.034.008-.091.02c-.074.017-.188.045-.31.076-.16.041-.323.078-.485.108q0-.182-.014-.374a6.162,6.162,0,0,1,1.87-3.956A6.643,6.643,0,0,1,55.212.9.469.469,0,0,0,54.87.032a7.448,7.448,0,0,0-2.223,1.509,7.229,7.229,0,0,0-1.659,2.437,4.837,4.837,0,0,0-1.119-1.837C47.744.019,43.762.68,43.527.721h0a.457.457,0,0,0-.367.314.6.6,0,0,0-.017.066c-.027.151-.573,3.346.8,5.557a7.353,7.353,0,0,0-3.914,6.923,11.6,11.6,0,0,0,1.142,4.581,14.2,14.2,0,0,0,2.744,4.091A5.044,5.044,0,0,0,47.309,24a6.6,6.6,0,0,0,1.88-.276A3.331,3.331,0,0,1,51,23.691l.006,0,.11.031A6.6,6.6,0,0,0,53,24a4.912,4.912,0,0,0,3.25-1.608,13.985,13.985,0,0,0,4.029-8.812A8.163,8.163,0,0,0,58.743,8.638ZM49.206,2.8a5.247,5.247,0,0,1,1.256,3.409c-.017.211-.025,1.132-.025,1.132L46.881,3.794a.469.469,0,0,0-.663.663L49.8,8.033c-1.224.066-3.343-.027-4.572-1.255C43.75,5.3,43.912,2.552,44.02,1.6c.953-.108,3.709-.27,5.185,1.2ZM55.6,21.716A4.033,4.033,0,0,1,53,23.062a5.728,5.728,0,0,1-1.609-.236l-.141-.04h0a4.269,4.269,0,0,0-2.329.04,5.728,5.728,0,0,1-1.609.236A4.172,4.172,0,0,1,44.58,21.59a13.058,13.058,0,0,1-3.612-8.009c0-3.445,1.878-5.444,3.571-6.163l.024.024a6.632,6.632,0,0,0,4.665,1.547A9.91,9.91,0,0,0,50.9,8.863c.374-.082.365-.256.388-.364V8.482a9.219,9.219,0,0,0,.107-.965.475.475,0,0,0,.083-.007c.22-.038.441-.085.658-.142.084-.022.165-.042.232-.058,1.934.674,3.846,2.849,3.846,6.269a9.857,9.857,0,0,1-.747,3.455.469.469,0,1,0,.874.339,10.789,10.789,0,0,0,.811-3.795,7.594,7.594,0,0,0-3.162-6.493,4.317,4.317,0,0,1,1.17.122c2.013.521,4.18,2.737,4.18,6.371A13.138,13.138,0,0,1,55.6,21.716Z" transform="translate(-0.5)" fill="currentColor" stroke="currentColor" stroke-width="0.1"></path>
                            </g>
                        </svg></span><span class="whitespace-nowrap">Grocery</span><span class="flex pt-1 ltr:ml-auto ltr:pl-2.5 rtl:mr-auto rtl:pr-2.5"><svg width="10" height="6" viewBox="0 0 10 6">
                            <path d="M128,192l5,5,5-5Z" transform="translate(-128 -192)" fill="currentColor"></path>
                        </svg></span></button></div>
        </div>
    </div>

    @section('scripts')
    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            navigation: {
                nextEl: ".swiper-container .next",
                prevEl: ".swiper-container .prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true, // Enable clickable pagination
            },
            mousewheel: true,
            keyboard: true,
            slidesPerView: 1, // Default to show 1 item
            spaceBetween: 10, // Space between slides (adjust as needed)

            breakpoints: {
                // Responsive breakpoints
                640: {
                    slidesPerView: 1, // 1 slide for small screens (mobile)
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2, // 2 slides for medium screens (tablets)
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4, // 4 slides for larger screens (desktops)
                    spaceBetween: 30,
                },
            },
        });

    </script>
    @endsection