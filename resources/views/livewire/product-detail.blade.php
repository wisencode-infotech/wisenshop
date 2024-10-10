@section('title', 'Product Details')
<div>
   <div class="min-h-full text-center md:p-5"> 
         <div class="min-w-content relative inline-block max-w-full align-middle transition-all ltr:text-left rtl:text-right opacity-100 scale-100" id="headlessui-dialog-panel-:r1:" data-headlessui-state="open">
           <article class="relative z-[51] w-full max-w-6xl bg-light md:rounded-xl xl:min-w-[1152px]">
               <article class="rounded-lg bg-light">
                  <div class="flex flex-col border-b border-border-200 border-opacity-70 md:flex-row">
                     <div class="p-6 pt-10 md:w-1/2 lg:p-14 xl:p-16">
                        <div class="mb-8 flex items-center justify-between lg:mb-10">
                           <div role="button" class="transition-colors duration-200 bg-accent hover:bg-accent-hover focus:outline-0 rounded-full px-3 text-xs font-semibold leading-6 text-accent-contrast" wire:navigate href="{{ route('frontend.home') }}" title="Back">
                              <i class="fa fa-arrow-left mx-2"></i>
                           </div>
                           <div class="rounded-full bg-yellow-500 px-3 text-xs font-semibold leading-6 text-light">
                               <!-- Block for top right side of the product image -->
                           </div>
                       </div>
                        <div class="product-gallery h-full">
                           <div>
                              <div class="relative">
                                 <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden" id="productGallery">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">

                                        @if($product->images->isEmpty())
                                            <!-- If no product images are available, show the default image -->
                                            <div class="swiper-slide !flex items-center justify-center selection:bg-transparent swiper-slide-next" style="width: 448px;">
                                                <img alt="Default product image" loading="lazy" width="450" height="450" decoding="async" data-nimg="1" srcset="{{ $product->display_image_url }}" src="{{ $product->display_image_url }}" style="color: transparent;">
                                            </div>
                                        @else
                                            <!-- If product images are available, loop through them -->
                                            @foreach($product->images as $image)
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

                                       @foreach($product->images as $image)
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
                           <div class="flex w-full items-center justify-between">
                              <h1 class="text-lg font-semibold tracking-tight text-heading md:text-xl xl:text-2xl cursor-pointer transition-colors hover:text-accent text-accent">
                                 {{ $product->name }}
                              </h1>

                              <div class="flex items-center rtl:space-x-reverse">
                                 @livewire('remind-when-stock-available', ['product' => $product])
                                 <livewire:wishlist-button :product_id="$product->id" />
                              </div>
                           </div>
                           <div class="mt-2 flex items-center justify-between">
                              <div class="inline-flex shrink-0 items-center rounded border border-accent bg-accent px-3 py-1 text-sm text-accent-contrast">
                                 <i class="fa fa-star"></i>
                                 @if (($prouct_avg_rating = $product->average_rating) > 0)
                                    {{ $prouct_avg_rating }}
                                 @endif
                                 <span class="ms-1">({{ $product->total_reviews . ' ' . __trans('Reviews') }})</span>
                              </div>
                           </div>
                           <div class="mt-3 text-sm leading-7 text-body md:mt-4 react-editor-description">
                              <div>{!! $product->short_description !!}</div>
                              {{-- <br><span><button class="mt-1 inline-block font-bold text-accent ">Read more</button></span> --}}
                           </div>
                           <span class="my-5 flex items-center md:my-10">
                              <ins class="text-2xl font-semibold text-accent no-underline md:text-3xl">
                                 @livewire('product-price', ['product_id' => $product->id])
                              </ins>
                           </span>

                           @if ($product->variations()->count() > 0)
                              <div class="mt-6 flex flex-col items-center md:mt-6 lg:flex-row">
                                 @livewire('product-variation', ['product_id' => $product->id])
                              </div>
                           @endif

                           <div class="mt-6 flex flex-col items-center md:mt-6 lg:flex-row">
                              <div class="mb-3 w-full lg:mb-0 lg:max-w-[400px]">
                                @livewire('quantity-selector', ['product_id' => $product->id, 'layout' => 'large'])
                            </div>

                            @livewire('product-stock', ['product_id' => $product->id, 'layout' => 'product-detail'])

                           </div>
                        </div>
                        <div class="mt-4 flex w-full flex-row items-start border-t border-border-200 border-opacity-60 pt-4 md:mt-6 md:pt-6">
                           <span class="py-1 text-sm font-semibold capitalize text-heading ltr:mr-6 rtl:ml-6">{{ __trans('Categories') }}</span>
                           <div class="flex flex-row flex-wrap">
                              <button class="mb-2 whitespace-nowrap rounded border border-border-200 bg-transparent py-1 px-2.5 text-sm lowercase tracking-wider text-heading transition-colors hover:border-accent hover:text-accent focus:bg-opacity-100 focus:outline-0 ltr:mr-2 rtl:ml-2" 
                              x-navigate href="{{ route('frontend.home', ['catid' => $product->category_id]) }}">
                                 {{ $product->category->name }}
                              </button>
                            
                            </div>
                        </div>
                     </div>
                  </div>
                  <div class="border-b border-border-200 border-opacity-70 px-5 py-4 lg:px-16 lg:py-14">
                     <h2 class="mb-4 text-lg font-semibold tracking-tight text-heading md:mb-6">{{ __trans('Description') }}</h2>
                     <p class="text-sm text-body react-editor-description">{!! $product->description !!}</p>
                  </div>
               </article>

               <div class="p-5 md:py-12 lg:px-16">
                  <h2 class="mb-7 text-lg font-semibold tracking-tight text-heading">Ratings &amp; Reviews of  {{ $product->name }}</h2>
                  <div class="flex w-full flex-col divide-y divide-gray-200 divide-opacity-70 sm:flex-row sm:items-center sm:space-x-8 sm:divide-y-0 sm:divide-x rtl:sm:space-x-reverse rtl:sm:divide-x-reverse">
                     <div class="w-full pb-4 sm:w-auto sm:pb-0">
                        <span class="inline-flex shrink-0 items-center rounded-full bg-accent text-white px-6 py-2 text-3xl font-semibold mb-4">
                          {{ $prouct_avg_rating }}
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.056 24" class="h-6 w-6 ltr:ml-2 rtl:mr-2">
                              <g data-name="Group 36413" fill="currentColor">
                                 <path id="Path_22667" data-name="Path 22667" d="M19.474,34.679l-6.946-4.346L5.583,34.679a.734.734,0,0,1-1.1-.8L6.469,25.93.263,20.668a.735.735,0,0,1,.421-1.3l8.1-.566,3.064-7.6a.765.765,0,0,1,1.362,0l3.064,7.6,8.1.566a.735.735,0,0,1,.421,1.3L18.588,25.93l1.987,7.949a.734.734,0,0,1-1.1.8Z" transform="translate(0 -10.792)"></path>
                              </g>
                           </svg>
                        </span>
                        <p class="text-base text-gray-400"><span>{{ $product->total_reviews }} ratings</span></p>
                     </div>

                     <div class="w-full space-y-3 py-0.5 pt-4 sm:w-auto sm:pt-0 ltr:sm:pl-8 rtl:sm:pr-8">
                      @foreach ([5, 4, 3, 2, 1] as $star)

                          @php
                              $count = $product->{'total_' . $star . '_star_reviews'};
                              $percentage = $product->total_reviews > 0 ? ($count / $product->total_reviews) * 100 : 0;
                              $color = config('general.review_colors.' . $star); // Get the color for the current star
                          @endphp

                          <div class="flex items-center text-sm text-heading">
                              <div class="flex w-11 shrink-0 items-center space-x-1 font-semibold rtl:space-x-reverse">
                                  <span class="text-sm font-semibold text-heading">{{ $star }}</span>
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.056 24" class="h-2.5 w-2.5 ltr:ml-1.5 rtl:mr-1.5">
                                      <g data-name="Group 36413" fill="currentColor">
                                          <path id="Path_22667" data-name="Path 22667" d="M19.474,34.679l-6.946-4.346L5.583,34.679a.734.734,0,0,1-1.1-.8L6.469,25.93.263,20.668a.735.735,0,0,1,.421-1.3l8.1-.566,3.064-7.6a.765.765,0,0,1,1.362,0l3.064,7.6,8.1.566a.735.735,0,0,1,.421,1.3L18.588,25.93l1.987,7.949a.734.734,0,0,1-1.1.8Z" transform="translate(0 -10.792)"></path>
                                      </g>
                                  </svg>
                              </div>
                              <div class="relative h-[5px] w-52 overflow-hidden rounded-md bg-[#F1F1F1]">
                              <div class="absolute h-full rounded-md {{ $color }}" style="width: {{ $percentage }}%;"></div>
                              </div>
                              <div class="shrink-0 ltr:pl-5 rtl:pr-5">{{ $count }}</div>
                          </div>
                      @endforeach
                  </div>
                  </div>
               </div>

               <div>
                  <div class="border-t border-b border-border-200 border-opacity-70 px-5 ltr:lg:pl-16 ltr:lg:pr-10 rtl:lg:pr-16 rtl:lg:pl-10">
                     <div class="flex flex-col justify-between sm:flex-row sm:items-center">
                        <h2 class="mt-3 text-lg font-semibold tracking-tight text-heading sm:mt-0">Product Reviews ({{ $product->total_reviews }})</h2>
                        <div class="flex flex-col items-center border-border-200 border-opacity-70 py-3 sm:space-y-1 ltr:sm:border-l rtl:sm:border-r lg:flex-row lg:space-y-0 lg:!border-0 lg:py-0">
                           <div class="w-full shrink-0 border-border-200 border-opacity-70 ltr:sm:pl-8 ltr:sm:pr-5 rtl:sm:pl-5 rtl:sm:pr-8 lg:w-auto lg:py-5 ltr:lg:border-l rtl:lg:border-r">
                              <!-- <div class="flex items-center">
                                 <span class="min-w-[50px] text-sm text-body ltr:mr-2 rtl:ml-2">Sort By :</span>
                                 <div class=" css-b62m3t-container">
                                    <span id="react-select-2-live-region" class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false" aria-relevant="additions text" role="log" class="css-7pg0cj-a11yText"></span>
                                    <div class=" css-1fxaex9">
                                       <div class=" css-7u2net">
                                          <div class=" css-1ek5eys-singleValue">Ratings: Low to High</div>
                                          <input id="react-select-2-input" tabindex="0" inputmode="none" aria-autocomplete="list" aria-expanded="false" aria-haspopup="true" role="combobox" aria-activedescendant="" aria-readonly="true" class="css-1hac4vs-dummyInput" value="">
                                       </div>
                                       <div class=" css-1wy0on6">
                                          <span class=" css-1hyfx7x"></span>
                                          <div class=" css-1jtba1a-indicatorContainer" aria-hidden="true">
                                             <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-8mmkcg">
                                                <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                                             </svg>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div> -->
                           </div>
                           <div class="w-full shrink-0 border-border-200 border-opacity-70 ltr:sm:pl-8 ltr:sm:pr-5 rtl:sm:pl-5 rtl:sm:pr-8 lg:w-auto lg:py-5 ltr:lg:border-l rtl:lg:border-r">
                              <!-- <div class="flex items-center">
                                 <span class="min-w-[50px] text-sm text-body ltr:mr-2 rtl:ml-2">Filter :</span>
                                 <div class=" css-b62m3t-container">
                                    <span id="react-select-3-live-region" class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false" aria-relevant="additions text" role="log" class="css-7pg0cj-a11yText"></span>
                                    <div class=" css-xnv90r">
                                       <div class=" css-7u2net">
                                          <div class=" css-1ek5eys-singleValue">5 Star</div>
                                          <input id="react-select-3-input" tabindex="0" inputmode="none" aria-autocomplete="list" aria-expanded="false" aria-haspopup="true" role="combobox" aria-activedescendant="" aria-readonly="true" class="css-1hac4vs-dummyInput" value="">
                                       </div>
                                       <div class=" css-1wy0on6">
                                          <span class=" css-1hyfx7x"></span>
                                          <div class=" css-1jtba1a-indicatorContainer" aria-hidden="true">
                                             <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-8mmkcg">
                                                <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                                             </svg>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="flex flex-col items-center justify-center px-5 py-16 border-b border-border-200 border-opacity-70">
                     <h3 class="text-lg font-semibold text-gray-400">No reviews found</h3>
                  </div>
               </div>


               <div class="p-5 md:pb-10 lg:p-14 xl:p-16">
                  <h2 class="mb-6 text-lg font-semibold tracking-tight text-heading">{{ __trans('Related Products') }}</h2>
                 <livewire:products :category_id="$product->category_id" :exclude_product_ids="[$product->id]" />
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
</script>
@endsection