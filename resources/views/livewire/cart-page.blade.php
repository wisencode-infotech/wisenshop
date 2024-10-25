@section('title', __trans('Cart'))

<div>
    <div class="flex flex-col items-start w-full px-5 py-10 mx-auto max-w-1920 bg-light lg:bg-gray-100 xl:flex-row xl:py-14 xl:px-8 2xl:px-14">
        @livewire('user-sidebar')
        <div class="w-full overflow-hidden lg:flex">
            <div class="md:p-8 bg-light shadow rounded w-full shadow-none sm:shadow">
                <div class="flex w-full flex-col">
                        <div class="mb-8 flex items-center justify-center sm:mb-10">
                           <h1 class="text-center text-lg font-semibold text-heading sm:text-xl">{{ __trans('Cart') }}</h1>
                       </div>

                        @if (count($cart) > 0)
                           <header class="top-0 z-10 flex items-center justify-between border-b border-border-200 border-opacity-75 bg-light px-6 py-4">
                              <div class="flex font-semibold text-accent">
                                 <svg width="24" height="22" class="shrink-0" viewBox="0 0 12.686 16">
                                    <g transform="translate(-27.023 -2)">
                                       <g transform="translate(27.023 5.156)">
                                          <g>
                                             <path d="M65.7,111.043l-.714-9A1.125,1.125,0,0,0,63.871,101H62.459V103.1a.469.469,0,1,1-.937,0V101H57.211V103.1a.469.469,0,1,1-.937,0V101H54.862a1.125,1.125,0,0,0-1.117,1.033l-.715,9.006a2.605,2.605,0,0,0,2.6,2.8H63.1a2.605,2.605,0,0,0,2.6-2.806Zm-4.224-4.585-2.424,2.424a.468.468,0,0,1-.663,0l-1.136-1.136a.469.469,0,0,1,.663-.663l.8.8,2.092-2.092a.469.469,0,1,1,.663.663Z" transform="translate(-53.023 -101.005)" fill="currentColor"></path>
                                          </g>
                                       </g>
                                       <g transform="translate(30.274 2)">
                                          <g>
                                             <path d="M160.132,0a3.1,3.1,0,0,0-3.093,3.093v.063h.937V3.093a2.155,2.155,0,1,1,4.311,0v.063h.937V3.093A3.1,3.1,0,0,0,160.132,0Z" transform="translate(-157.039)" fill="currentColor"></path>
                                          </g>
                                       </g>
                                    </g>
                                 </svg>
                                 <span class="flex ltr:ml-2 rtl:mr-2">{{ count($cart) }} {{ __trans('Items') }}</span>
                              </div>
                              <button class="flex">
                                 <span class="flex h-full shrink-0 items-center rounded-full bg-light px-5 text-accent font-bold">{{ __userCurrencySymbol() }} {{ number_format($total_price, 2) }}</span>
                              </button>
                           </header>
                        @endif

                        <div>
                           @foreach($cart as $cart_key => $item)
                              <div class="flex items-center border-b border-solid border-border-200 border-opacity-75 px-4 py-4 text-sm sm:px-6" style="opacity: 1;">

                                 <div wire:loading.flex class="fixed inset-0 z-10 flex items-center justify-center bg-accent-400 bg-opacity-10">
                                    <div class="loader"></div>
                                </div>

                                 @livewire('quantity-selector', ['product_id' => $item['product_id'], 'product_variation_id' => $item['product_variation_id'], 'layout' => 'cart', key('quantity-selector-' . $item['product_id'].'-variation-'.$item['product_variation_id'])])
                                 
                                 <div class="relative mx-4 flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden bg-gray-100 sm:h-16 sm:w-16"><img alt="Apples" loading="lazy" decoding="async" data-nimg="fill" class="object-contain" sizes="(max-width: 768px) 100vw" srcset="{{ $item['product_picture'] }}" src="{{ $item['product_picture'] }}" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                 <div>
                                    <h3 class="font-bold text-heading">
                                       {{ $item['product_name'] }} 
                                       @if (!empty($item['product_variation_name']))
                                          <span class="text-muted text-xs">[{{ $item['product_variation_name'] }}]</span>
                                       @endif
                                    </h3>
                                    <p class="my-2.5 font-semibold text-accent">{{ __userCurrencySymbol() }} {{ $item['product_price'] }}</p>
                                 </div>
                                 <span class="font-bold text-heading ltr:ml-auto rtl:mr-auto">{{ __userCurrencySymbol() }} {{ $item['product_price'] *  $item['quantity']}}</span>
                                 <button  x-on:click="$dispatch('remove-cart-product', { product_id: {{ $item['product_id'] }}, product_variation_id: {{ $item['product_variation_id'] ?? 0 }} }) " class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full text-muted transition-all duration-200 hover:bg-gray-100 hover:text-red-600 focus:bg-gray-100 focus:text-red-600 focus:outline-0 ltr:ml-3 ltr:-mr-2 rtl:mr-3 rtl:-ml-2">
                                    <span class="sr-only">close</span>
                                    <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                       <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                 </button>
                              </div>
                             @endforeach
                        </div>

                        @if (count($cart) > 0)
                        <div class="mt-4 w-full max-w-md bg-light px-6 py-5 md:ml-auto">
                           <button wire:navigate href="{{ route('frontend.guest.checkout') }}" class="flex h-12 w-full justify-between rounded-full bg-accent p-1 text-sm font-bold shadow-700 transition-colors hover:bg-accent-hover focus:bg-accent-hover focus:outline-0 md:h-14"><span class="flex h-full flex-1 items-center px-5 text-light">{{ __trans('Checkout') }}</span><span class="flex h-full shrink-0 items-center rounded-full bg-light px-5 text-accent">{{ __userCurrencySymbol() }} {{ number_format($total_price, 2) }}</span></button>
                        </div>
                        @else
                        <div class="flex flex-col items-center justify-center h-64 bg-white mt-4">
                          <i class="fa fa-shopping-cart text-muted text-xl"></i>
                         
                           <p class="mt-4 text-lg font-semibold text-gray-700">{{ __trans('Your cart is empty') }}</p>
                           <p class="mt-1 text-sm text-gray-500">{{ __trans('Browse our products and add them to your cart') }}</p>
                           <a wire:navigate href="{{ route('frontend.home') }}" class="mt-6 inline-block px-6 py-2 text-accent-contrast bg-accent rounded-lg hover:bg-accent-hover">
                              {{ __trans('Shop Now') }}
                           </a>
                         </div>                         
                        @endif
               </div>
            </div>
        </div>
    </div>
</div>