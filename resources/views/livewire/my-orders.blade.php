@section('title', __trans('Orders'))

<div>
   <div class="min-h-full text-center md:p-5"> 
      <div class="min-w-content relative sm:inline-block max-w-full align-middle transition-all ltr:text-left rtl:text-right opacity-100 scale-100" id="headlessui-dialog-panel-:r1:" data-headlessui-state="open">
         <div class="w-full px-5 py-10 mx-auto  bg-light lg:bg-gray-100 xl:flex-row xl:py-14 xl:px-8 2xl:px-14">

          @if(count($orders) == 0)
            
              <div class="relative z-[51] w-full max-w-6xl bg-light md:rounded-xl xl:min-w-[1152px]">
               <div class="flex flex-col h-full pb-8 pt-8 items-center justify-center h-64 bg-white mt-4 md:border-border-200">
                  <!-- Icon (Shopping Cart) -->
                 <i class="fa fa-shopping-cart text-muted text-xl"></i>
                
                  <!-- Text -->
                  <p class="mt-4 text-lg font-semibold text-gray-700">{{ __trans("Sorry, No orders found") }}</p>
                  
                  
                  <!-- Button (Optional) -->
                  <a wire:navigate href="{{ route('frontend.home') }}" class="mt-6 inline-block px-6 py-2 text-accent-contrast bg-accent rounded-lg hover:bg-accent-hover">
                     {{ __trans('Shop Now') }}
                  </a> 
                </div>  
             </div>

          @else
             <div class="">
                <div class="relative z-[51] w-full max-w-6xl bg-light md:rounded-xl xl:min-w-[1152px]">
                   <div class="flex h-full flex-col bg-white pb-5 md:border md:border-border-200">
                      <h3 class="py-5 px-5 text-xl font-semibold text-heading">My Orders</h3>
                      <div data-overlayscrollbars-initialize="" class="os-theme-thin-dark w-full" data-overlayscrollbars="host" style="height: calc(100% - 80px);">
                         <div class="os-size-observer">
                            <div class="os-size-observer-listener ltr"></div>
                         </div>
                         <div data-overlayscrollbars-contents="" data-overlayscrollbars-viewport="scrollbarHidden" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; top: 0px; right: auto; left: 0px; width: calc(100% + 0px); padding: 0px; overflow-y: scroll;">
                            <div class="px-5">
                              @foreach($orders as $order)
                               <div wire:navigate href="{{ route('frontend.orders.details', $order->id) }}"  role="button" class="mb-4 flex w-full shrink-0 cursor-pointer flex-col overflow-hidden rounded border-2 border-transparent bg-gray-100 last:mb-0">
                                  <div class="flex items-center justify-between border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex shrink-0 text-sm font-bold text-heading ltr:mr-4 rtl:ml-4 lg:text-base">Order<span class="font-normal">#{{ $order->id }}</span></span><span class="max-w-full truncate whitespace-nowrap rounded bg-status-processing bg-opacity-[.15] text-status-processing px-3 py-2 text-sm" title="Order Processing">{{ config('general.order_statuses.' . $order->status) }}</span></div>
                                  <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                                     <p class="mb-4 flex w-full items-center justify-between text-sm text-heading last:mb-0"><span class="w-24 shrink-0 overflow-hidden">Order Date</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="ltr:ml-1 rtl:mr-1">{{ $order->created_at->format('M d, Y h:i A') }}</span></p>

                                     <p class="mb-4 flex w-full items-center justify-between text-sm text-heading last:mb-0"><span class="w-24 shrink-0 overflow-hidden">Payment Method</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="truncate ltr:ml-1 rtl:mr-1">{{ $order->payment->details->name }}</span></p>

                                     <p class="mb-4 flex w-full items-center justify-between text-sm text-heading last:mb-0"><span class="w-24 shrink-0 overflow-hidden">Currency</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="truncate ltr:ml-1 rtl:mr-1">{{ $order->currency->code }}</span></p>

                                     
                                     <p class="mb-4 flex w-full items-center justify-between text-sm font-bold text-heading last:mb-0"><span class="w-24 flex-shrink-0 overflow-hidden">Total Price</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="ltr:ml-1 rtl:mr-1">{{ $order->currency->symbol }} {{ number_format($order->total_price, 2) }}</span></p>
                                  </div>
                               </div>
                              @endforeach

                               <div class="mt-8 flex justify-center lg:mt-12">
                                  <button wire:click="loadMore" data-variant="normal" class="inline-flex items-center justify-center shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-0 focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 h-11 text-sm font-semibold md:text-base">
                                     <!-- Show "Load More" when not loading -->
                                      <span wire:loading.remove>{{ __trans('Load More') }}</span>

                                      <!-- Show "Load More..." while loading -->
                                      <span wire:loading wire:target="loadMore">{{ __trans('Loading...') }}</span>
                                  </button>
                              </div>
                            </div>
                         </div>
                         <div class="os-scrollbar os-scrollbar-horizontal os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-unusable os-scrollbar-auto-hide-hidden">
                            <div class="os-scrollbar-track">
                               <div class="os-scrollbar-handle" style="width: 100%;"></div>
                            </div>
                         </div>
                         <div class="os-scrollbar os-scrollbar-vertical os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-visible os-scrollbar-auto-hide-hidden">
                            <div class="os-scrollbar-track">
                               <div class="os-scrollbar-handle" style="height: 14.889%;"></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          @endif
      </div>
      </div>
   </div>
</div>