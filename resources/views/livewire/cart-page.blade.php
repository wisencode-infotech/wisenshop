@section('title', __trans('Cart'))

<div class="min-h-full text-center md:p-5">
         <div data-overlayscrollbars-initialize="" class="min-w-content relative inline-block max-w-full align-middle transition-all ltr:text-left rtl:text-right opacity-100 scale-100 relative z-[51] w-full max-w-6xl bg-light md:rounded-xl xl:min-w-[1152px]" data-overlayscrollbars="host">
            
            <div data-overlayscrollbars-contents="" data-overlayscrollbars-viewport="scrollbarHidden" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; top: 0px; right: auto; left: 0px; width: calc(100% + 0px); padding: 0px; overflow-y: scroll;">
               <section class="relative flex h-full flex-col ">
                  <header class="fixed top-0 z-10 flex w-full max-w-md items-center justify-between border-b border-border-200 border-opacity-75 bg-light px-6 py-4">
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
                        <span class="flex h-full shrink-0 items-center rounded-full bg-light px-5 text-accent font-bold">{{ number_format($total_price, 2) }}</span>
                     </button>
                  </header>
                  <div class="grow pt-16 pb-20">

                    @foreach($cart as $productId => $item)
                     <div class="flex items-center border-b border-solid border-border-200 border-opacity-75 px-4 py-4 text-sm sm:px-6" style="opacity: 1;">

                        @livewire('quantity-selector', ['productId' => $productId, 'layout' => 'cart', key(uniqid())])
                        
                        <div class="relative mx-4 flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden bg-gray-100 sm:h-16 sm:w-16"><img alt="Apples" loading="lazy" decoding="async" data-nimg="fill" class="object-contain" sizes="(max-width: 768px) 100vw" srcset="{{ $item['product']->display_image_url }}" src="{{ $item['product']->display_image_url }}" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                        <div>
                           <h3 class="font-bold text-heading">{{ $item['product']->name }} </h3>
                           <p class="my-2.5 font-semibold text-accent">${{ $item['product']->price }}</p>
                           <!-- <span class="text-xs text-body">{{ $item['quantity'] }} X 1lb</span> -->
                        </div>
                        <span class="font-bold text-heading ltr:ml-auto rtl:mr-auto">${{ $item['product']->price *  $item['quantity']}}</span>
                        <button  x-on:click="$dispatch('remove-cart-product', { product_id: {{ $productId }} }) " class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full text-muted transition-all duration-200 hover:bg-gray-100 hover:text-red-600 focus:bg-gray-100 focus:text-red-600 focus:outline-0 ltr:ml-3 ltr:-mr-2 rtl:mr-3 rtl:-ml-2">
                           <span class="sr-only">close</span>
                           <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                           </svg>
                        </button>
                     </div>
                    @endforeach
                  </div>
                  <footer class="fixed bottom-0 z-10 w-full max-w-md bg-light px-6 py-5"><button class="flex h-12 w-full justify-between rounded-full bg-accent p-1 text-sm font-bold shadow-700 transition-colors hover:bg-accent-hover focus:bg-accent-hover focus:outline-0 md:h-14"><span class="flex h-full flex-1 items-center px-5 text-light">Checkout</span><span class="flex h-full shrink-0 items-center rounded-full bg-light px-5 text-accent">{{ number_format($total_price, 2) }}</span></button></footer>
               </section>
            </div>
            <div class="os-scrollbar os-scrollbar-horizontal os-theme-dark os-scrollbar-auto-hide os-scrollbar-auto-hide-hidden os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-unusable">
               <div class="os-scrollbar-track">
                  <div class="os-scrollbar-handle" style="width: 100%;"></div>
               </div>
            </div>
            <div class="os-scrollbar os-scrollbar-vertical os-theme-dark os-scrollbar-auto-hide os-scrollbar-auto-hide-hidden os-scrollbar-handle-interactive os-scrollbar-visible os-scrollbar-cornerless">
               <div class="os-scrollbar-track">
                  <div class="os-scrollbar-handle" style="height: 93.22%;"></div>
               </div>
            </div>
         </div>
      </div>