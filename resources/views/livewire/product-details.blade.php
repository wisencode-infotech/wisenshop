@section('title', 'Product Details')
<div>
   <div class="min-h-full text-center md:p-5"> 
         <div class="min-w-content relative inline-block max-w-full align-middle transition-all ltr:text-left rtl:text-right opacity-100 scale-100" id="headlessui-dialog-panel-:r1:" data-headlessui-state="open">
           <article class="relative z-[51] w-full max-w-6xl bg-light md:rounded-xl xl:min-w-[1152px]">
               <article class="rounded-lg bg-light">
                  <div class="flex flex-col border-b border-border-200 border-opacity-70 md:flex-row">
                     <div class="p-6 pt-10 md:w-1/2 lg:p-14 xl:p-16">
                        <div class="mb-8 flex items-center justify-between lg:mb-10">
                           <div class="rounded-full bg-yellow-500 px-3 text-xs font-semibold leading-6 text-light ltr:ml-auto rtl:mr-auto">20%</div>
                        </div>
                        <div class="product-gallery h-full">
                           <div>
                              <div class="relative">
                                 <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden" id="productGallery">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">

                                        @if($product_info->images->isEmpty())
                                            <!-- If no product images are available, show the default image -->
                                            <div class="swiper-slide !flex items-center justify-center selection:bg-transparent swiper-slide-next" style="width: 448px;">
                                                <img alt="Default product image" loading="lazy" width="450" height="450" decoding="async" data-nimg="1" srcset="{{ $product_info->display_image_url }}" src="{{ $product_info->display_image_url }}" style="color: transparent;">
                                            </div>
                                        @else
                                            <!-- If product images are available, loop through them -->
                                            @foreach($product_info->images as $image)
                                                <div class="swiper-slide !flex items-center justify-center selection:bg-transparent swiper-slide-active" style="width: 448px;">
                                                    <img alt="Product gallery" loading="lazy" width="450" height="450" decoding="async" data-nimg="1" srcset="{{ $image->image_url }}" src="{{ $image->image_url }}" style="color: transparent;">
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                 </div>
                                 <div class="absolute z-10 flex items-center justify-center w-8 h-8 -mt-4 transition-all duration-200 border rounded-full shadow-xl cursor-pointer product-gallery-prev top-2/4 border-border-200 border-opacity-70 bg-light text-heading hover:bg-gray-100 ltr:-left-4 rtl:-right-4 md:-mt-5 md:h-9 md:w-9 ltr:md:-left-5 rtl:md:-right-5 swiper-button-disabled">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                 </div>
                                 <div class="absolute z-10 flex items-center justify-center w-8 h-8 -mt-4 transition-all duration-200 border rounded-full shadow-xl cursor-pointer product-gallery-next top-2/4 border-border-200 border-opacity-70 bg-light text-heading hover:bg-gray-100 ltr:-right-4 rtl:-left-4 md:-mt-5 md:h-9 md:w-9 ltr:md:-right-5 rtl:md:-left-5">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                 </div>
                              </div>
                              <div class="relative mx-auto mt-5 max-w-md lg:mt-8 lg:pb-2">
                                 <div class="swiper swiper-initialized swiper-horizontal swiper-free-mode swiper-watch-progress swiper-backface-hidden swiper-thumbs" id="productGalleryThumbs">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">

                                       @foreach($product_info->images as $image)
                                             <div class="swiper-slide !flex cursor-pointer items-center justify-center overflow-hidden rounded border border-border-200 border-opacity-75 hover:opacity-75 swiper-slide-visible swiper-slide-fully-visible swiper-slide-active swiper-slide-thumb-active" style="width: 97px; margin-right: 20px;">
                                             <div class="relative w-20 h-20"><img alt="Product thumb " loading="lazy" decoding="async" data-nimg="fill" class="object-contain" sizes="100vw" srcset="{{ $image->image_url }}" src="{{ $image->image_url }}" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                          </div>
                                       @endforeach

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="flex flex-col items-start p-5 pt-10 md:w-1/2 lg:p-14 xl:p-16">
                        <div class="w-full">
                           <div class="flex w-full items-start justify-between space-x-8 rtl:space-x-reverse">
                              <h1 class="text-lg font-semibold tracking-tight text-heading md:text-xl xl:text-2xl cursor-pointer transition-colors hover:text-accent">{{ $product_info->name }}</h1>
                              <div>
                                 <button type="button" class="mt-0.5 flex h-10 w-10 shrink-0 items-center justify-center rounded-full border text-xl text-accent transition-colors border-gray-300 mr-1">
                                    <svg viewBox="0 -28 512.001 512" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor">
                                       <path d="M256 455.516c-7.29 0-14.316-2.641-19.793-7.438-20.684-18.086-40.625-35.082-58.219-50.074l-.09-.078c-51.582-43.957-96.125-81.918-127.117-119.313C16.137 236.81 0 197.172 0 153.871c0-42.07 14.426-80.883 40.617-109.293C67.121 15.832 103.488 0 143.031 0c29.555 0 56.621 9.344 80.446 27.77C235.5 37.07 246.398 48.453 256 61.73c9.605-13.277 20.5-24.66 32.527-33.96C312.352 9.344 339.418 0 368.973 0c39.539 0 75.91 15.832 102.414 44.578C497.578 72.988 512 111.801 512 153.871c0 43.3-16.133 82.938-50.777 124.738-30.993 37.399-75.532 75.356-127.106 119.309-17.625 15.016-37.597 32.039-58.328 50.168a30.046 30.046 0 0 1-19.789 7.43zM143.031 29.992c-31.066 0-59.605 12.399-80.367 34.914-21.07 22.856-32.676 54.45-32.676 88.965 0 36.418 13.535 68.988 43.883 105.606 29.332 35.394 72.961 72.574 123.477 115.625l.093.078c17.66 15.05 37.68 32.113 58.516 50.332 20.961-18.254 41.012-35.344 58.707-50.418 50.512-43.051 94.137-80.223 123.469-115.617 30.344-36.618 43.879-69.188 43.879-105.606 0-34.516-11.606-66.11-32.676-88.965-20.758-22.515-49.3-34.914-80.363-34.914-22.758 0-43.653 7.235-62.102 21.5-16.441 12.719-27.894 28.797-34.61 40.047-3.452 5.785-9.53 9.238-16.261 9.238s-12.809-3.453-16.262-9.238c-6.71-11.25-18.164-27.328-34.61-40.047-18.448-14.265-39.343-21.5-62.097-21.5zm0 0"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                           <div class="mt-2 flex items-center justify-between">
                              <span class="block text-sm font-normal text-body">1lb</span>
                              <div class="inline-flex shrink-0 items-center rounded border border-accent bg-accent px-3 py-1 text-sm text-white">
                                 4.67
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.056 24" class="h-2.5 w-2.5 ltr:ml-1 rtl:mr-1">
                                    <g data-name="Group 36413" fill="currentColor">
                                       <path id="Path_22667" data-name="Path 22667" d="M19.474,34.679l-6.946-4.346L5.583,34.679a.734.734,0,0,1-1.1-.8L6.469,25.93.263,20.668a.735.735,0,0,1,.421-1.3l8.1-.566,3.064-7.6a.765.765,0,0,1,1.362,0l3.064,7.6,8.1.566a.735.735,0,0,1,.421,1.3L18.588,25.93l1.987,7.949a.734.734,0,0,1-1.1.8Z" transform="translate(0 -10.792)"></path>
                                    </g>
                                 </svg>
                              </div>
                           </div>
                           <div class="mt-3 text-sm leading-7 text-body md:mt-4 react-editor-description">
                              <div>{!! $product_info->description !!}</div>
                              <!-- <br><span><button class="mt-1 inline-block font-bold text-accent ">Read more</button></span> -->
                           </div>
                           <span class="my-5 flex items-center md:my-10"><ins class="text-2xl font-semibold text-accent no-underline md:text-3xl">${{ $product_info->price }}</ins><del class="text-sm font-normal text-muted ltr:ml-2 rtl:mr-2 md:text-base">${{ $product_info->price }}</del></span>
                           <div class="mt-6 flex flex-col items-center md:mt-6 lg:flex-row">
                              <div class="mb-3 w-full lg:mb-0 lg:max-w-[400px]">
                                <div class="overflow-hidden w-full h-14 rounded text-light bg-accent inline-flex justify-between">
                                    <button class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5" id="minusButton">
                                        <span class="sr-only">minus</span>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 stroke-2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <div id="valueDisplay" class="flex flex-1 items-center justify-center px-3 text-sm font-semibold">3</div>
                                    <button class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5" id="plusButton" title="">
                                        <span class="sr-only">plus</span>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="md:w-4.5 h-3.5 w-3.5 stroke-2.5 md:h-4.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                              <span class="whitespace-nowrap text-base text-body ltr:lg:ml-7 rtl:lg:mr-7">{{ $product_info->stock }} pieces available</span>
                           </div>
                        </div>
                        <div class="mt-4 flex w-full flex-row items-start border-t border-border-200 border-opacity-60 pt-4 md:mt-6 md:pt-6">
                           <span class="py-1 text-sm font-semibold capitalize text-heading ltr:mr-6 rtl:ml-6">Categories</span>
                           <div class="flex flex-row flex-wrap">
                            <button class="mb-2 whitespace-nowrap rounded border border-border-200 bg-transparent py-1 px-2.5 text-sm lowercase tracking-wider text-heading transition-colors hover:border-accent hover:text-accent focus:bg-opacity-100 focus:outline-0 ltr:mr-2 rtl:ml-2">{{ $product_info->category->name }}</button>
                            
                            </div>
                        </div>
                        <div class="mt-2 flex items-center"><span class="py-1 text-sm font-semibold capitalize text-heading ltr:mr-6 rtl:ml-6">Sellers</span><button class="text-sm tracking-wider text-accent underline transition hover:text-accent-hover hover:no-underline">Grocery Shop</button></div>
                     </div>
                  </div>
                  <div class="border-b border-border-200 border-opacity-70 px-5 py-4 lg:px-16 lg:py-14">
                     <h2 class="mb-4 text-lg font-semibold tracking-tight text-heading md:mb-6">Details</h2>
                     <p class="text-sm text-body react-editor-description">{!! $product_info->description !!}</p>
                  </div>
               </article>
               <div class="p-5 md:pb-10 lg:p-14 xl:p-16">
                  <h2 class="mb-6 text-lg font-semibold tracking-tight text-heading">Related Products</h2>
                 <livewire:products :category_id="$product_info->category_id" />
               </div>
            </article>
            
         </div>
      </div>
</div>

@section('scripts')
<script type="text/javascript">
    var productGalleryThumbs = new Swiper('#productGalleryThumbs', {
      spaceBetween: 20,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });

    var productGallery = new Swiper('#productGallery', {
      spaceBetween: 10,
      thumbs: {
        swiper: productGalleryThumbs,
      },
      navigation: {
        nextEl: '.product-gallery-next',
        prevEl: '.product-gallery-prev',
      },
    });


    // cart js
    $(document).ready(function () {
        let currentValue = 0; // Initial value
        $('#valueDisplay').text(currentValue); // Set initial display

        $('#minusButton').on('click', function () {
            if (currentValue > 0) { // Prevent going below 0
                currentValue--;
                $('#valueDisplay').text(currentValue);
            }
        });

        $('#plusButton').on('click', function () {
            currentValue++;
            $('#valueDisplay').text(currentValue);
        });
    });
</script>
@endsection