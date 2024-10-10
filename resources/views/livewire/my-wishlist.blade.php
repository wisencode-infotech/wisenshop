@section('title', __trans('Profile'))

<div>
    <div class="flex flex-col items-start w-full px-5 py-10 mx-auto max-w-1920 bg-light lg:bg-gray-100 xl:flex-row xl:py-14 xl:px-8 2xl:px-14">
        @livewire('user-sidebar')
        <div class="w-full overflow-hidden lg:flex">
            <div class="p-5 md:p-8 bg-light shadow rounded w-full shadow-none sm:shadow">
               <div class="flex w-full flex-col">
                  <div class="mb-8 flex items-center justify-center sm:mb-10">
                     <h1 class="text-center text-lg font-semibold text-heading sm:text-xl">{{ __trans('My Wishlists') }}</h1>
                  </div>

                  @foreach($wishlists as $wishlist)
                  <div class="flex w-full items-start space-x-4 border-b border-gray-200 py-5 first:pt-0 last:border-0 last:pb-0 rtl:space-x-reverse sm:space-x-5 xl:items-center">
                     <div class="relative flex h-16 w-16 shrink-0 items-center justify-center border border-gray-200 sm:h-[74px] sm:w-[74px]">
                        <img alt="text" loading="lazy" decoding="async" data-nimg="fill" sizes="100vw" srcset="{{ $wishlist->product->display_image_url }}" src="{{ $wishlist->product->display_image_url }}" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                     <div class="flex w-full flex-col items-start sm:flex-row sm:justify-between sm:space-x-4 rtl:sm:space-x-reverse xl:items-center">
                        <div class="flex w-full flex-col sm:items-start">
                           <a class="text-lg font-semibold text-heading transition-colors hover:text-accent" href="{{ route('frontend.product-detail', ['product_slug' => $wishlist->product->slug]) }}">{{ $wishlist->product->name }}</a>
                           <p class="mt-1.5 flex flex-col items-start space-y-3">
                              <a class="inline-block w-auto text-sm font-semibold text-body-dark transition-colors hover:text-accent" href="{{ route('frontend.home', ['catid' => $wishlist->product->category_id]) }}">{{ $wishlist->product->category->name }}</a>
                              <!-- <span class="inline-flex shrink-0 items-center rounded-full bg-accent text-white px-2 py-[3px] text-sm !rounded">
                                 3.33
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.056 24" class="h-2.5 w-2.5 ltr:ml-1 rtl:mr-1">
                                    <g data-name="Group 36413" fill="currentColor">
                                       <path id="Path_22667" data-name="Path 22667" d="M19.474,34.679l-6.946-4.346L5.583,34.679a.734.734,0,0,1-1.1-.8L6.469,25.93.263,20.668a.735.735,0,0,1,.421-1.3l8.1-.566,3.064-7.6a.765.765,0,0,1,1.362,0l3.064,7.6,8.1.566a.735.735,0,0,1,.421,1.3L18.588,25.93l1.987,7.949a.734.734,0,0,1-1.1.8Z" transform="translate(0 -10.792)"></path>
                                    </g>
                                 </svg>
                              </span> -->
                           </p>
                        </div>
                        <div class="mt-4 flex w-full flex-col justify-between space-y-3 xs:flex-row xs:space-y-0 sm:w-auto sm:flex-col sm:justify-end sm:space-y-3 md:mt-0">
                           <span class="flex min-w-150 items-center sm:justify-end"><ins class="text-xl font-semibold text-heading no-underline">{{ __userCurrencySymbol().''.$wishlist->product->price }}</ins></span>
                           <div class="flex items-center space-x-6 rtl:space-x-reverse sm:justify-end">
                              <button wire:click="removeFromWishlist({{ $wishlist->id }})" class="whitespace-nowrap text-sm font-semibold text-red-500 hover:underline sm:mt-0">{{ __trans('Remove') }}</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
        </div>
    </div>
</div>