@section('title', __trans('Orders'))

<div>
    <div class="flex flex-col items-start w-full px-5 py-10 mx-auto max-w-1920 bg-light lg:bg-gray-100 xl:flex-row xl:py-14 xl:px-8 2xl:px-14">
        <aside class="hidden shrink-0 ltr:mr-8 rtl:ml-8 xl:block xl:w-80">
            <div class="overflow-hidden rounded border border-border-200 bg-light">
                <ul class="py-7">
                    <li class="py-1"><a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent" wire:navigate href="{{ route('frontend.profile') }}">Profile</a></li>
                    <li class="py-1"><a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent !border-accent text-accent" wire:navigate href="{{ route('frontend.my-orders') }}">My Orders</a></li>
                    <li class="py-1"><a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent" href="/wishlists">My Wishlists</a></li>
                    <li class="py-1"><a class="block border-l-4 border-transparent py-2 px-10 font-semibold text-heading transition-colors hover:text-accent focus:text-accent" wire:navigate href="{{ route('frontend.contact-us') }}">Need Help</a></li>
                </ul>
                <ul class="border-t border-border-200 bg-light py-4">
                    <li class="block py-2 px-11 "><button class="font-semibold text-heading transition-colors hover:text-accent focus:text-accent" wire:navigate href="{{ route('frontend.logout') }}">Logout</button></li>
                </ul>
            </div>
        </aside>
        <div class="hidden w-full overflow-hidden lg:flex">
            <div class="h-[80vh] min-h-[670px] w-full ltr:pr-5 rtl:pl-5 md:w-1/3 md:shrink-0 ltr:lg:pr-8 rtl:lg:pl-8">
                <div class="flex h-full flex-col bg-white pb-5 md:border md:border-border-200">
                    <h3 class="py-5 px-5 text-xl font-semibold text-heading">My Orders</h3>
                    <div data-overlayscrollbars-initialize="" class="os-theme-thin-dark w-full" data-overlayscrollbars="host" style="height: calc(100% - 80px);">
                        <div class="os-size-observer">
                            <div class="os-size-observer-listener ltr"></div>
                        </div>
                        <div data-overlayscrollbars-contents="" data-overlayscrollbars-viewport="scrollbarHidden" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; top: 0px; right: auto; left: 0px; width: calc(100% + 0px); padding: 0px; overflow-y: scroll;">
                            <div class="px-5">
                                @if (count($orders) == 0)
                                <div class="relative z-[51] w-full max-w-6xl bg-light md:rounded-xl xl:min-w-[1152px]">
                                    <div
                                        class="flex flex-col h-full pb-8 pt-8 items-center justify-center h-64 bg-white mt-4 md:border-border-200">
                                        <!-- Icon (Shopping Cart) -->
                                        <i class="fa fa-frown fa-3x text-muted text-xl"></i>

                                        <!-- Text -->
                                        <p class="mt-4 text-lg font-semibold text-gray-700">{{ __trans('Sorry, No orders found') }}
                                        </p>


                                        <!-- Button (Optional) -->
                                        <a wire:navigate href="{{ route('frontend.home') }}"
                                            class="mt-6 inline-block px-6 py-2 text-accent-contrast bg-accent rounded-lg hover:bg-accent-hover">
                                            {{ __trans('Shop Now') }}
                                        </a>
                                    </div>
                                </div>
                                @else
                                @foreach ($orders as $order)
                                <div wire:click="showOrder({{ $order->id }})" role="button" class="mb-4 flex w-full shrink-0 cursor-pointer flex-col overflow-hidden rounded border-2 border-transparent bg-gray-100 last:mb-0 {{ $order->id == $order_data->id ? '!border-accent' : '' }}">
                                    <div class="flex items-center justify-between border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex shrink-0 text-sm font-bold text-heading ltr:mr-4 rtl:ml-4 lg:text-base">Order<span class="font-normal">#{{ $order->id }}</span></span><span class="max-w-full truncate whitespace-nowrap rounded bg-status-processing bg-opacity-[.15] text-status-processing px-3 py-2 text-sm" title="Order Processing">{{ config('general.order_statuses.' . $order->status) }}</span></div>
                                    <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                                        <p class="mb-4 flex w-full items-center justify-between text-sm text-heading last:mb-0"><span class="w-24 shrink-0 overflow-hidden">Order Date</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="ltr:ml-1 rtl:mr-1">{{ $order->created_at->format('M d, Y h:i A') }}</span></p>
                                        <p class="mb-4 flex w-full items-center justify-between text-sm text-heading last:mb-0"><span class="w-24 shrink-0 overflow-hidden">{{ __trans('Payment Method') }}</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="truncate ltr:ml-1 rtl:mr-1">{{ $order->payment->details->name }}</span></p>
                                        <p class="mb-4 flex w-full items-center justify-between text-sm font-bold text-heading last:mb-0"><span class="w-24 shrink-0 overflow-hidden">Payment {{ __trans('Currency') }}</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="ltr:ml-1 rtl:mr-1">{{ $order->currency->code }}</span></p>
                                        <p class="mb-4 flex w-full items-center justify-between text-sm font-bold text-heading last:mb-0"><span class="w-24 flex-shrink-0 overflow-hidden">Total Price</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="ltr:ml-1 rtl:mr-1">{{ $order->currency->symbol . ' ' . number_format($order->total_price, 2) }}</span></p>
                                    </div>
                                </div>
                                @endforeach
                                @if ($orders->hasMorePages())
                                <div class="mt-8 flex justify-center lg:mt-12">
                                    <button wire:click="loadMore" data-variant="normal" class="inline-flex items-center justify-center shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-0 focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 h-11 text-sm font-semibold md:text-base">
                                        <!-- Show "Load More" when not loading -->
                                        <span wire:loading.remove>{{ __trans('Load More') }}</span>
                                        <!-- Show "Load More..." while loading -->
                                        <span wire:loading wire:target="loadMore">{{ __trans('Loading...') }}</span>
                                    </button>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="os-scrollbar os-scrollbar-horizontal os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-unusable os-scrollbar-auto-hide-hidden">
                            <div class="os-scrollbar-track">
                                <div class="os-scrollbar-handle" style="width: 100%;"></div>
                            </div>
                        </div>
                        <div class="os-scrollbar os-scrollbar-vertical os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-visible os-scrollbar-cornerless os-scrollbar-auto-hide-hidden">
                            <div class="os-scrollbar-track">
                                <div class="os-scrollbar-handle" style="height: 22.101%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($order_data)
            <div class="flex w-full flex-col border border-border-200 bg-white lg:w-2/3">
                <div class="flex flex-col items-center p-5 md:flex-row md:justify-between">
                    <h2 class="mb-2 flex text-sm font-semibold text-heading md:text-lg">Order Details <span class="px-2">-</span> {{ $order_data->id }}</h2>
                    <!-- <div class="flex items-center"><a class="flex items-center text-sm font-semibold text-accent no-underline transition duration-200 hover:text-accent-hover focus:text-accent-hover" href="/orders/20241009757127"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" class="ltr:mr-2 rtl:ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>Details</a></div> -->
                </div>
                <div class="relative mx-5 mb-6 overflow-hidden rounded">
                    <div class="bg-[#F7F8FA] px-7 py-4">
                        <div class="flex flex-col flex-wrap items-center justify-between mb-0 text-base font-bold gap-x-8 text-heading sm:flex-row lg:flex-nowrap">
                            <div class="order-2 grid w-full grid-cols-1 gap-6 xs:flex-nowrap sm:order-1 max-w-full basis-full justify-between md:grid-cols-2">
                                <div class="flex items-center gap-3"><span class="block text-xs shrink-0 grow-0 basis-auto xs:text-base lg:inline-block">Order Status :</span>
                                    <div class="w-full lg:w-auto"><span class="px-3 py-1 rounded-full bg-status-processing bg-opacity-[.15] text-status-processing min-h-[2rem] items-center justify-center text-[9px] !leading-none xs:text-sm inline-flex">{{ config('general.order_statuses.' . $order->status) }}</span></div>
                                </div>
                                <div class="flex items-center gap-3 md:ml-auto"><span class="block text-xs shrink-0 grow-0 basis-auto xs:text-base lg:inline-block">{{ __trans('Payment Method') }} :</span>
                                    <div class="w-full lg:w-auto"><span class="px-3 py-1 rounded-full text-light bg-accent bg-opacity-[.15] !text-accent min-h-[2rem] items-center justify-center truncate whitespace-nowrap text-[9px] !leading-none xs:text-sm inline-flex">{{ $order->payment->details->name }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col border-b border-border-200 sm:flex-row">
                    <div class="flex w-full flex-col border-b border-border-200 px-5 py-4 sm:border-b-0 ltr:sm:border-r rtl:sm:border-l md:w-3/5">
                        <div class="mb-4"><span class="mb-2 block text-sm font-bold text-heading">Shipping Address</span><span class="text-sm text-body">Kp Cikole Rt 02 Rw 03
                                Desa Margaluyu, Jawa Barat, Sukabumi, 43192, Indonesia</span></div>
                        <div><span class="mb-2 block text-sm font-bold text-heading">Billing Address</span><span class="text-sm text-body">Kp Cikole Rt 02 Rw 03
                                Desa Margaluyu, Jawa Barat, Sukabumi, 43192, Indonesia</span></div>
                    </div>
                    <div class="flex w-full flex-col px-5 py-4 md:w-2/5">
                        <div class="mb-3 flex justify-between"><span class="text-sm text-body">Sub Total</span><span class="text-sm text-heading">$299.00</span></div>
                        <div class="mb-3 flex justify-between"><span class="text-sm text-body">Discount</span><span class="text-sm text-heading">$0.00</span></div>
                        <div class="mb-3 flex justify-between"><span class="text-sm text-body">Delivery Fee</span><span class="text-sm text-heading">$50.00</span></div>
                        <div class="mb-3 flex justify-between"><span class="text-sm text-body">Tax</span><span class="text-sm text-heading">$5.98</span></div>
                        <div class="flex justify-between"><span class="text-sm font-bold text-heading">Total</span><span class="text-sm font-bold text-heading">{{ $order->currency->symbol . ' ' . number_format($order->total_price, 2) }}</span></div>
                    </div>
                </div>
                <div>
                    <div class="flex w-full items-center justify-center px-6">
                        <div data-overlayscrollbars-initialize="" class="os-theme-thin-dark h-full w-full" data-overlayscrollbars="host">
                            <div class="os-size-observer">
                                <div class="os-size-observer-listener ltr"></div>
                            </div>
                            <div data-overlayscrollbars-contents="" data-overlayscrollbars-viewport="scrollbarHidden" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; top: 0px; right: auto; left: 0px; width: calc(100% + 0px); padding: 0px;">
                                <div class=" flex w-full flex-col py-7 md:flex-row md:items-start">
                                    <div class="progress-box_progress_container__n7Sm7">
                                        <div class="progress-box_progress_wrapper__JZ0Ia progress-box_checked__bYvuh">
                                            <div class="progress-box_status_wrapper__Wemi0">
                                                <div class="h-4 w-3"><svg xmlns="http://www.w3.org/2000/svg" width="20.894" height="16" viewBox="0 0 20.894 16" class="w-full">
                                                        <path data-name="_ionicons_svg_ios-checkmark (3)" d="M169.184,175.473l-1.708-1.756a.367.367,0,0,0-.272-.116.352.352,0,0,0-.272.116l-11.837,11.925-4.308-4.308a.375.375,0,0,0-.543,0l-1.727,1.727a.387.387,0,0,0,0,.553l5.434,5.434a1.718,1.718,0,0,0,1.135.553,1.8,1.8,0,0,0,1.126-.534h.01l12.973-13.041A.415.415,0,0,0,169.184,175.473Z" transform="translate(-148.4 -173.6)" fill="currentColor"></path>
                                                    </svg></div>
                                            </div>
                                            <div class="progress-box_bar__pcoY4"></div>
                                        </div>
                                        <div class="flex flex-col items-start ltr:ml-5 rtl:mr-5 md:items-center ltr:md:ml-0 rtl:md:mr-0"><span class="text-base font-semibold capitalize text-body-dark ltr:text-left rtl:text-right md:px-2 md:!text-center">Pending</span></div>
                                    </div>
                                    <div class="progress-box_progress_container__n7Sm7">
                                        <div class="progress-box_progress_wrapper__JZ0Ia progress-box_checked__bYvuh">
                                            <div class="progress-box_status_wrapper__Wemi0">
                                                <div class="h-4 w-3"><svg xmlns="http://www.w3.org/2000/svg" width="20.894" height="16" viewBox="0 0 20.894 16" class="w-full">
                                                        <path data-name="_ionicons_svg_ios-checkmark (3)" d="M169.184,175.473l-1.708-1.756a.367.367,0,0,0-.272-.116.352.352,0,0,0-.272.116l-11.837,11.925-4.308-4.308a.375.375,0,0,0-.543,0l-1.727,1.727a.387.387,0,0,0,0,.553l5.434,5.434a1.718,1.718,0,0,0,1.135.553,1.8,1.8,0,0,0,1.126-.534h.01l12.973-13.041A.415.415,0,0,0,169.184,175.473Z" transform="translate(-148.4 -173.6)" fill="currentColor"></path>
                                                    </svg></div>
                                            </div>
                                            <div class="progress-box_bar__pcoY4"></div>
                                        </div>
                                        <div class="flex flex-col items-start ltr:ml-5 rtl:mr-5 md:items-center ltr:md:ml-0 rtl:md:mr-0"><span class="text-base font-semibold capitalize text-body-dark ltr:text-left rtl:text-right md:px-2 md:!text-center">Processing</span></div>
                                    </div>
                                    <div class="progress-box_progress_container__n7Sm7">
                                        <div class="progress-box_progress_wrapper__JZ0Ia">
                                            <div class="progress-box_status_wrapper__Wemi0">3</div>
                                            <div class="progress-box_bar__pcoY4"></div>
                                        </div>
                                        <div class="flex flex-col items-start ltr:ml-5 rtl:mr-5 md:items-center ltr:md:ml-0 rtl:md:mr-0"><span class="text-base font-semibold capitalize text-body-dark ltr:text-left rtl:text-right md:px-2 md:!text-center">At Local Facility</span></div>
                                    </div>
                                    <div class="progress-box_progress_container__n7Sm7">
                                        <div class="progress-box_progress_wrapper__JZ0Ia">
                                            <div class="progress-box_status_wrapper__Wemi0">4</div>
                                            <div class="progress-box_bar__pcoY4"></div>
                                        </div>
                                        <div class="flex flex-col items-start ltr:ml-5 rtl:mr-5 md:items-center ltr:md:ml-0 rtl:md:mr-0"><span class="text-base font-semibold capitalize text-body-dark ltr:text-left rtl:text-right md:px-2 md:!text-center">Out For Delivery</span></div>
                                    </div>
                                    <div class="progress-box_progress_container__n7Sm7">
                                        <div class="progress-box_progress_wrapper__JZ0Ia">
                                            <div class="progress-box_status_wrapper__Wemi0">5</div>
                                            <div class="progress-box_bar__pcoY4"></div>
                                        </div>
                                        <div class="flex flex-col items-start ltr:ml-5 rtl:mr-5 md:items-center ltr:md:ml-0 rtl:md:mr-0"><span class="text-base font-semibold capitalize text-body-dark ltr:text-left rtl:text-right md:px-2 md:!text-center">Completed</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="os-scrollbar os-scrollbar-horizontal os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-unusable">
                                <div class="os-scrollbar-track">
                                    <div class="os-scrollbar-handle" style="width: 100%;"></div>
                                </div>
                            </div>
                            <div class="os-scrollbar os-scrollbar-vertical os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-unusable">
                                <div class="os-scrollbar-track">
                                    <div class="os-scrollbar-handle" style="height: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rc-table orderDetailsTable w-full rc-table-fixed-header rc-table-scroll-horizontal">
                        <div class="rc-table-container">
                            <div class="rc-table-header" style="overflow: hidden;">
                                <table style="table-layout: fixed;">
                                    <colgroup>
                                        <col style="width: 398.438px;">
                                        <col style="width: 159.375px;">
                                        <col style="width: 159.375px;">
                                        <col style="width: 223.141px;">
                                        <col style="width: 17px;">
                                    </colgroup>
                                    <thead class="rc-table-thead">
                                        <tr>
                                            <th title="Item" class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;"><span class="ltr:pl-20 rtl:pr-20">Item</span></th>
                                            <th class="rc-table-cell" style="text-align: center;">Quantity</th>
                                            <th class="rc-table-cell" style="text-align: right;">Price</th>
                                            <th class="rc-table-cell" style="text-align: right;"></th>
                                            <th class="rc-table-cell rc-table-cell-scrollbar"></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="rc-table-body" style="overflow: auto scroll; max-height: 500px;">
                                <table style="width: 350px; min-width: 100%; table-layout: fixed;">
                                    <colgroup>
                                        <col style="width: 250px;">
                                        <col style="width: 100px;">
                                        <col style="width: 100px;">
                                        <col style="width: 140px;">
                                    </colgroup>
                                    <tbody class="rc-table-tbody">
                                        <tr aria-hidden="true" class="rc-table-measure-row" style="height: 0px; font-size: 0px;">
                                            <td style="padding: 0px; border: 0px; height: 0px;">
                                                <div style="height: 0px; overflow: hidden;">&nbsp;</div>
                                            </td>
                                            <td style="padding: 0px; border: 0px; height: 0px;">
                                                <div style="height: 0px; overflow: hidden;">&nbsp;</div>
                                            </td>
                                            <td style="padding: 0px; border: 0px; height: 0px;">
                                                <div style="height: 0px; overflow: hidden;">&nbsp;</div>
                                            </td>
                                            <td style="padding: 0px; border: 0px; height: 0px;">
                                                <div style="height: 0px; overflow: hidden;">&nbsp;</div>
                                            </td>
                                        </tr>
                                        <tr data-row-key="2021-03-08 10:24:53" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                            <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                <div class="flex items-center">
                                                    <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Apples" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                    <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                        <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/apples">Apples</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$1.60</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: center;">
                                                <p class="text-base">5</p>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;">
                                                <div>$8.00</div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;"></td>
                                        </tr>
                                        <tr data-row-key="2021-03-08 10:26:13" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                            <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                <div class="flex items-center">
                                                    <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Baby Spinach" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                    <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                        <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/baby-spinach">Baby Spinach</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">2lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$0.60</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: center;">
                                                <p class="text-base">5</p>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;">
                                                <div>$3.00</div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;"></td>
                                        </tr>
                                        <tr data-row-key="2021-03-08 10:40:00" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                            <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                <div class="flex items-center">
                                                    <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Blueberries" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                    <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                        <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/blueberries">Blueberries</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$3.00</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: center;">
                                                <p class="text-base">9</p>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;">
                                                <div>$27.00</div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;"></td>
                                        </tr>
                                        <tr data-row-key="2021-03-08 10:45:18" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                            <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                <div class="flex items-center">
                                                    <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Clementines" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                    <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                        <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/clementines">Clementines</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$2.50</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: center;">
                                                <p class="text-base">10</p>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;">
                                                <div>$25.00</div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;"></td>
                                        </tr>
                                        <tr data-row-key="2021-03-08 10:44:09" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                            <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                <div class="flex items-center">
                                                    <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Celery Stick" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                    <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                        <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/celery-stick">Celery Stick</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$5.00</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: center;">
                                                <p class="text-base">10</p>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;">
                                                <div>$50.00</div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;"></td>
                                        </tr>
                                        <tr data-row-key="2021-03-08 10:52:16" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                            <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                <div class="flex items-center">
                                                    <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Green Beans" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                    <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                        <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/green-beans">Green Beans</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$4.00</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: center;">
                                                <p class="text-base">7</p>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;">
                                                <div>$28.00</div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;"></td>
                                        </tr>
                                        <tr data-row-key="2021-03-08 10:55:14" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                            <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                <div class="flex items-center">
                                                    <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Pepper" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                    <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                        <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/pepper">Pepper</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$5.00</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: center;">
                                                <p class="text-base">10</p>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;">
                                                <div>$50.00</div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;"></td>
                                        </tr>
                                        <tr data-row-key="2021-03-08 10:58:54" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                            <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                <div class="flex items-center">
                                                    <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Strawberry" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                    <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                        <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/strawberry">Strawberry</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$8.00</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: center;">
                                                <p class="text-base">12</p>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;">
                                                <div>$96.00</div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;"></td>
                                        </tr>
                                        <tr data-row-key="2021-03-08 11:01:10" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                            <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                <div class="flex items-center">
                                                    <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Lemon" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                    <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                        <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/lemon">Lemon</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">4pc(s)</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$1.20</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: center;">
                                                <p class="text-base">10</p>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;">
                                                <div>$12.00</div>
                                            </td>
                                            <td class="rc-table-cell" style="text-align: right;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="flex w-full flex-col lg:hidden">
            <div class="flex h-full w-full flex-col px-0 pb-5">
                <h3 class="pb-5 text-xl font-semibold text-heading">My Orders</h3>
                <div class="rc-collapse" role="tablist">
                    @if (count($orders) == 0)

                    <div class="relative z-[51] w-full max-w-6xl bg-light md:rounded-xl xl:min-w-[1152px]">
                        <div
                            class="flex flex-col h-full pb-8 pt-8 items-center justify-center h-64 bg-white mt-4 md:border-border-200">
                            <!-- Icon (Shopping Cart) -->
                            <i class="fa fa-frown fa-3x text-muted text-xl"></i>

                            <!-- Text -->
                            <p class="mt-4 text-lg font-semibold text-gray-700">{{ __trans('Sorry, No orders found') }}
                            </p>


                            <!-- Button (Optional) -->
                            <a wire:navigate href="{{ route('frontend.home') }}"
                                class="mt-6 inline-block px-6 py-2 text-accent-contrast bg-accent rounded-lg hover:bg-accent-hover">
                                {{ __trans('Shop Now') }}
                            </a>
                        </div>
                    </div>
                    @else
                    @foreach ($orders as $order)
                    <div class="rc-collapse-item mb-4">
                        <div wire:click="showMobileOrder({{ $order->id }})" class="accordion-title rc-collapse-header" aria-expanded="false" aria-disabled="false" role="tab" tabindex="0"><span class="rc-collapse-header-text">
                                <div role="button" class="mb-4 flex w-full shrink-0 cursor-pointer flex-col overflow-hidden rounded border-2 border-transparent bg-gray-100 last:mb-0 {{ !empty($show_mobile_order_data) && $order->id == $show_mobile_order_data->id ? '!border-accent' : '' }}">
                                    <div class="flex items-center justify-between border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex shrink-0 text-sm font-bold text-heading ltr:mr-4 rtl:ml-4 lg:text-base">Order<span class="font-normal">#{{ $order->id }}</span></span><span class="max-w-full truncate whitespace-nowrap rounded bg-status-processing bg-opacity-[.15] text-status-processing px-3 py-2 text-sm" title="Order Processing">{{ config('general.order_statuses.' . $order->status) }}</span></div>
                                    <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                                        <p class="mb-4 flex w-full items-center justify-between text-sm text-heading last:mb-0"><span class="w-24 shrink-0 overflow-hidden">Order Date</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="ltr:ml-1 rtl:mr-1">{{ $order->created_at->format('M d, Y h:i A') }}</span></p>
                                        <p class="mb-4 flex w-full items-center justify-between text-sm text-heading last:mb-0"><span class="w-24 shrink-0 overflow-hidden">{{ __trans('Payment Method') }}</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="truncate ltr:ml-1 rtl:mr-1">{{ $order->payment->details->name }}</span></p>
                                        <p class="mb-4 flex w-full items-center justify-between text-sm font-bold text-heading last:mb-0"><span class="w-24 shrink-0 overflow-hidden">Payment {{ __trans('Currency') }}</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="ltr:ml-1 rtl:mr-1">{{ $order->currency->code }}</span></p>
                                        <p class="mb-4 flex w-full items-center justify-between text-sm font-bold text-heading last:mb-0"><span class="w-24 flex-shrink-0 overflow-hidden">Total Price</span><span class="ltr:mr-auto rtl:ml-auto">:</span><span class="ltr:ml-1 rtl:mr-1">{{ $order->currency->symbol . ' ' . number_format($order->total_price, 2) }}</span></p>
                                    </div>
                                </div>
                            </span>
                        </div>
                        @if($show_mobile_order_data)
                        <div class="rc-collapse-content rc-collapse-content-inactive {{ $show_mobile_order_data->id != $order->id ? 'rc-collapse-content-hidden' : '' }}" role="tabpanel">
                            <div class="rc-collapse-content-box">
                                <div class="flex w-full flex-col border border-border-200 bg-white lg:w-2/3">
                                    <div class="flex flex-col items-center p-5 md:flex-row md:justify-between">
                                        <h2 class="mb-2 flex text-sm font-semibold text-heading md:text-lg">Order Details <span class="px-2">-</span> {{ $order->id }}</h2>
                                        <div class="flex items-center"><a class="flex items-center text-sm font-semibold text-accent no-underline transition duration-200 hover:text-accent-hover focus:text-accent-hover" href="/orders/20241009757127"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" class="ltr:mr-2 rtl:ml-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>Details</a></div>
                                    </div>
                                    <div class="relative mx-5 mb-6 overflow-hidden rounded">
                                        <div class="bg-[#F7F8FA] px-7 py-4">
                                            <div class="flex flex-col flex-wrap items-center justify-between mb-0 text-base font-bold gap-x-8 text-heading sm:flex-row lg:flex-nowrap">
                                                <div class="order-2 grid w-full grid-cols-1 gap-6 xs:flex-nowrap sm:order-1 max-w-full basis-full justify-between md:grid-cols-2">
                                                    <div class="flex items-center gap-3"><span class="block text-xs shrink-0 grow-0 basis-auto xs:text-base lg:inline-block">Order Status :</span>
                                                        <div class="w-full lg:w-auto"><span class="px-3 py-1 rounded-full bg-status-processing bg-opacity-[.15] text-status-processing min-h-[2rem] items-center justify-center text-[9px] !leading-none xs:text-sm inline-flex">Order Processing</span></div>
                                                    </div>
                                                    <div class="flex items-center gap-3 md:ml-auto"><span class="block text-xs shrink-0 grow-0 basis-auto xs:text-base lg:inline-block">Payment Status :</span>
                                                        <div class="w-full lg:w-auto"><span class="px-3 py-1 rounded-full text-light bg-accent bg-opacity-[.15] !text-accent min-h-[2rem] items-center justify-center truncate whitespace-nowrap text-[9px] !leading-none xs:text-sm inline-flex">Cash On Delivery</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col border-b border-border-200 sm:flex-row">
                                        <div class="flex w-full flex-col border-b border-border-200 px-5 py-4 sm:border-b-0 ltr:sm:border-r rtl:sm:border-l md:w-3/5">
                                            <div class="mb-4"><span class="mb-2 block text-sm font-bold text-heading">Shipping Address</span><span class="text-sm text-body">Kp Cikole Rt 02 Rw 03
                                                    Desa Margaluyu, Jawa Barat, Sukabumi, 43192, Indonesia</span></div>
                                            <div><span class="mb-2 block text-sm font-bold text-heading">Billing Address</span><span class="text-sm text-body">Kp Cikole Rt 02 Rw 03
                                                    Desa Margaluyu, Jawa Barat, Sukabumi, 43192, Indonesia</span></div>
                                        </div>
                                        <div class="flex w-full flex-col px-5 py-4 md:w-2/5">
                                            <div class="mb-3 flex justify-between"><span class="text-sm text-body">Sub Total</span><span class="text-sm text-heading">$299.00</span></div>
                                            <div class="mb-3 flex justify-between"><span class="text-sm text-body">Discount</span><span class="text-sm text-heading">$0.00</span></div>
                                            <div class="mb-3 flex justify-between"><span class="text-sm text-body">Delivery Fee</span><span class="text-sm text-heading">$50.00</span></div>
                                            <div class="mb-3 flex justify-between"><span class="text-sm text-body">Tax</span><span class="text-sm text-heading">$5.98</span></div>
                                            <div class="flex justify-between"><span class="text-sm font-bold text-heading">Total</span><span class="text-sm font-bold text-heading">$354.98</span></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex w-full items-center justify-center px-6">
                                            <div data-overlayscrollbars-initialize="" class="os-theme-thin-dark h-full w-full" data-overlayscrollbars="host">
                                                <div class="os-size-observer">
                                                    <div class="os-size-observer-listener ltr"></div>
                                                </div>
                                                <div data-overlayscrollbars-contents="" data-overlayscrollbars-viewport="scrollbarHidden" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; top: 0px; right: auto; left: 0px; width: calc(100% + 0px); padding: 0px;">
                                                    <div class=" flex w-full flex-col py-7 md:flex-row md:items-start">
                                                        <div class="progress-box_progress_container__n7Sm7">
                                                            <div class="progress-box_progress_wrapper__JZ0Ia progress-box_checked__bYvuh">
                                                                <div class="progress-box_status_wrapper__Wemi0">
                                                                    <div class="h-4 w-3"><svg xmlns="http://www.w3.org/2000/svg" width="20.894" height="16" viewBox="0 0 20.894 16" class="w-full">
                                                                            <path data-name="_ionicons_svg_ios-checkmark (3)" d="M169.184,175.473l-1.708-1.756a.367.367,0,0,0-.272-.116.352.352,0,0,0-.272.116l-11.837,11.925-4.308-4.308a.375.375,0,0,0-.543,0l-1.727,1.727a.387.387,0,0,0,0,.553l5.434,5.434a1.718,1.718,0,0,0,1.135.553,1.8,1.8,0,0,0,1.126-.534h.01l12.973-13.041A.415.415,0,0,0,169.184,175.473Z" transform="translate(-148.4 -173.6)" fill="currentColor"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <div class="progress-box_bar__pcoY4"></div>
                                                            </div>
                                                            <div class="flex flex-col items-start ltr:ml-5 rtl:mr-5 md:items-center ltr:md:ml-0 rtl:md:mr-0"><span class="text-base font-semibold capitalize text-body-dark ltr:text-left rtl:text-right md:px-2 md:!text-center">Pending</span></div>
                                                        </div>
                                                        <div class="progress-box_progress_container__n7Sm7">
                                                            <div class="progress-box_progress_wrapper__JZ0Ia progress-box_checked__bYvuh">
                                                                <div class="progress-box_status_wrapper__Wemi0">
                                                                    <div class="h-4 w-3"><svg xmlns="http://www.w3.org/2000/svg" width="20.894" height="16" viewBox="0 0 20.894 16" class="w-full">
                                                                            <path data-name="_ionicons_svg_ios-checkmark (3)" d="M169.184,175.473l-1.708-1.756a.367.367,0,0,0-.272-.116.352.352,0,0,0-.272.116l-11.837,11.925-4.308-4.308a.375.375,0,0,0-.543,0l-1.727,1.727a.387.387,0,0,0,0,.553l5.434,5.434a1.718,1.718,0,0,0,1.135.553,1.8,1.8,0,0,0,1.126-.534h.01l12.973-13.041A.415.415,0,0,0,169.184,175.473Z" transform="translate(-148.4 -173.6)" fill="currentColor"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <div class="progress-box_bar__pcoY4"></div>
                                                            </div>
                                                            <div class="flex flex-col items-start ltr:ml-5 rtl:mr-5 md:items-center ltr:md:ml-0 rtl:md:mr-0"><span class="text-base font-semibold capitalize text-body-dark ltr:text-left rtl:text-right md:px-2 md:!text-center">Processing</span></div>
                                                        </div>
                                                        <div class="progress-box_progress_container__n7Sm7">
                                                            <div class="progress-box_progress_wrapper__JZ0Ia">
                                                                <div class="progress-box_status_wrapper__Wemi0">3</div>
                                                                <div class="progress-box_bar__pcoY4"></div>
                                                            </div>
                                                            <div class="flex flex-col items-start ltr:ml-5 rtl:mr-5 md:items-center ltr:md:ml-0 rtl:md:mr-0"><span class="text-base font-semibold capitalize text-body-dark ltr:text-left rtl:text-right md:px-2 md:!text-center">At Local Facility</span></div>
                                                        </div>
                                                        <div class="progress-box_progress_container__n7Sm7">
                                                            <div class="progress-box_progress_wrapper__JZ0Ia">
                                                                <div class="progress-box_status_wrapper__Wemi0">4</div>
                                                                <div class="progress-box_bar__pcoY4"></div>
                                                            </div>
                                                            <div class="flex flex-col items-start ltr:ml-5 rtl:mr-5 md:items-center ltr:md:ml-0 rtl:md:mr-0"><span class="text-base font-semibold capitalize text-body-dark ltr:text-left rtl:text-right md:px-2 md:!text-center">Out For Delivery</span></div>
                                                        </div>
                                                        <div class="progress-box_progress_container__n7Sm7">
                                                            <div class="progress-box_progress_wrapper__JZ0Ia">
                                                                <div class="progress-box_status_wrapper__Wemi0">5</div>
                                                                <div class="progress-box_bar__pcoY4"></div>
                                                            </div>
                                                            <div class="flex flex-col items-start ltr:ml-5 rtl:mr-5 md:items-center ltr:md:ml-0 rtl:md:mr-0"><span class="text-base font-semibold capitalize text-body-dark ltr:text-left rtl:text-right md:px-2 md:!text-center">Completed</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="os-scrollbar os-scrollbar-horizontal os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-unusable">
                                                    <div class="os-scrollbar-track">
                                                        <div class="os-scrollbar-handle" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <div class="os-scrollbar os-scrollbar-vertical os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-unusable">
                                                    <div class="os-scrollbar-track">
                                                        <div class="os-scrollbar-handle" style="height: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rc-table orderDetailsTable w-full rc-table-ping-right rc-table-fixed-header rc-table-scroll-horizontal">
                                            <div class="rc-table-container">
                                                <div class="rc-table-header" style="overflow: hidden;">
                                                    <table style="table-layout: fixed;">
                                                        <colgroup>
                                                            <col style="width: 250px;">
                                                            <col style="width: 100px;">
                                                            <col style="width: 100px;">
                                                            <col style="width: 140px;">
                                                        </colgroup>
                                                        <thead class="rc-table-thead">
                                                            <tr>
                                                                <th title="Item" class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;"><span class="ltr:pl-20 rtl:pr-20">Item</span></th>
                                                                <th class="rc-table-cell" style="text-align: center;">Quantity</th>
                                                                <th class="rc-table-cell" style="text-align: right;">Price</th>
                                                                <th class="rc-table-cell" style="text-align: right;"></th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                                <div class="rc-table-body" style="overflow: auto scroll; max-height: 500px;">
                                                    <table style="width: 350px; min-width: 100%; table-layout: fixed;">
                                                        <colgroup>
                                                            <col style="width: 250px;">
                                                            <col style="width: 100px;">
                                                            <col style="width: 100px;">
                                                            <col style="width: 140px;">
                                                        </colgroup>
                                                        <tbody class="rc-table-tbody">
                                                            <tr aria-hidden="true" class="rc-table-measure-row" style="height: 0px; font-size: 0px;">
                                                                <td style="padding: 0px; border: 0px; height: 0px;">
                                                                    <div style="height: 0px; overflow: hidden;">&nbsp;</div>
                                                                </td>
                                                                <td style="padding: 0px; border: 0px; height: 0px;">
                                                                    <div style="height: 0px; overflow: hidden;">&nbsp;</div>
                                                                </td>
                                                                <td style="padding: 0px; border: 0px; height: 0px;">
                                                                    <div style="height: 0px; overflow: hidden;">&nbsp;</div>
                                                                </td>
                                                                <td style="padding: 0px; border: 0px; height: 0px;">
                                                                    <div style="height: 0px; overflow: hidden;">&nbsp;</div>
                                                                </td>
                                                            </tr>
                                                            <tr data-row-key="2021-03-08 10:24:53" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                                                <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                                    <div class="flex items-center">
                                                                        <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Apples" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                                        <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                                            <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/apples">Apples</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$1.60</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: center;">
                                                                    <p class="text-base">5</p>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;">
                                                                    <div>$8.00</div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;"></td>
                                                            </tr>
                                                            <tr data-row-key="2021-03-08 10:26:13" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                                                <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                                    <div class="flex items-center">
                                                                        <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Baby Spinach" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                                        <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                                            <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/baby-spinach">Baby Spinach</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">2lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$0.60</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: center;">
                                                                    <p class="text-base">5</p>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;">
                                                                    <div>$3.00</div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;"></td>
                                                            </tr>
                                                            <tr data-row-key="2021-03-08 10:40:00" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                                                <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                                    <div class="flex items-center">
                                                                        <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Blueberries" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F3%2Fconversions%2Fblueberries-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                                        <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                                            <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/blueberries">Blueberries</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$3.00</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: center;">
                                                                    <p class="text-base">9</p>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;">
                                                                    <div>$27.00</div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;"></td>
                                                            </tr>
                                                            <tr data-row-key="2021-03-08 10:45:18" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                                                <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                                    <div class="flex items-center">
                                                                        <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Clementines" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F6%2Fconversions%2Fclementines-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                                        <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                                            <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/clementines">Clementines</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$2.50</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: center;">
                                                                    <p class="text-base">10</p>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;">
                                                                    <div>$25.00</div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;"></td>
                                                            </tr>
                                                            <tr data-row-key="2021-03-08 10:44:09" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                                                <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                                    <div class="flex items-center">
                                                                        <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Celery Stick" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F5%2Fconversions%2FCelerySticks-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                                        <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                                            <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/celery-stick">Celery Stick</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$5.00</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: center;">
                                                                    <p class="text-base">10</p>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;">
                                                                    <div>$50.00</div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;"></td>
                                                            </tr>
                                                            <tr data-row-key="2021-03-08 10:52:16" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                                                <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                                    <div class="flex items-center">
                                                                        <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Green Beans" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F12%2Fconversions%2FGreenBeans-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                                        <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                                            <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/green-beans">Green Beans</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$4.00</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: center;">
                                                                    <p class="text-base">7</p>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;">
                                                                    <div>$28.00</div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;"></td>
                                                            </tr>
                                                            <tr data-row-key="2021-03-08 10:55:14" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                                                <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                                    <div class="flex items-center">
                                                                        <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Pepper" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F15%2Fconversions%2FMiniPeppers-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                                        <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                                            <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/pepper">Pepper</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$5.00</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: center;">
                                                                    <p class="text-base">10</p>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;">
                                                                    <div>$50.00</div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;"></td>
                                                            </tr>
                                                            <tr data-row-key="2021-03-08 10:58:54" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                                                <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                                    <div class="flex items-center">
                                                                        <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Strawberry" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F19%2Fconversions%2Fstrawberry-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                                        <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                                            <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/strawberry">Strawberry</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">1lb</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$8.00</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: center;">
                                                                    <p class="text-base">12</p>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;">
                                                                    <div>$96.00</div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;"></td>
                                                            </tr>
                                                            <tr data-row-key="2021-03-08 11:01:10" class="rc-table-row rc-table-row-level-0 !cursor-auto">
                                                                <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                                                                    <div class="flex items-center">
                                                                        <div class="relative flex h-16 w-16 shrink-0 overflow-hidden rounded"><img alt="Lemon" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-cover" sizes="(max-width: 768px) 100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F21%2Fconversions%2FYellow-Limes-thumbnail.jpg&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>
                                                                        <div class="flex flex-col overflow-hidden ltr:ml-4 rtl:mr-4">
                                                                            <div class="mb-1 flex space-x-1 rtl:space-x-reverse"><a class="inline-block overflow-hidden truncate text-sm text-body transition-colors hover:text-accent hover:underline" href="/products/lemon">Lemon</a><span class="inline-block overflow-hidden truncate text-sm text-body">x</span><span class="inline-block overflow-hidden truncate text-sm font-semibold text-heading">4pc(s)</span></div><span class="mb-1 inline-block overflow-hidden truncate text-sm font-semibold text-accent">$1.20</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: center;">
                                                                    <p class="text-base">10</p>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;">
                                                                    <div>$12.00</div>
                                                                </td>
                                                                <td class="rc-table-cell" style="text-align: right;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach

                    @if ($orders->hasMorePages())
                    <div class="mt-8 flex justify-center">
                        <button wire:click="loadMore" data-variant="normal" class="inline-flex items-center justify-center shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-0 focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 h-11 text-sm font-semibold md:text-base">
                            <!-- Show "Load More" when not loading -->
                            <span wire:loading.remove>{{ __trans('Load More') }}</span>
                            <!-- Show "Load More..." while loading -->
                            <span wire:loading wire:target="loadMore">{{ __trans('Loading...') }}</span>
                        </button>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>