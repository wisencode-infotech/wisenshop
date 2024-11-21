<div>
    <div class="border-t border-border-200 bg-light px-5 py-5 md:p-8 lg:px-6">
        <div class="swiper-container relative">
            <div class="swiper mySwiper z-0">
                <div class="swiper-wrapper">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="swiper-slide flex justify-center items-center" style="width: 445.75px; margin-right: 24px;">
                            <div class="animate-pulse flex flex-col items-center w-full">
                                <div class="bg-gray-300 rounded-lg w-full h-40"></div> <!-- Skeleton image -->
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
