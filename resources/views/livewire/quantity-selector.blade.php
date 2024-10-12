<div>
    @if ($stock_available)
        @if ($layout == 'cart')
            <div class="flex overflow-hidden flex-col-reverse items-center w-8 h-24 bg-accent text-heading rounded-full text-accent-contrast">
                <button wire:click="decrement"
                    class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5">
                    <i class="fa fa-minus"></i>
                </button>
                <div class="flex flex-1 items-center justify-center px-3 text-sm font-semibold !px-0 text-heading">
                    {{ $quantity }}</div>
                <button wire:click="increment"
                    class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5"
                    title="">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        @elseif ($layout == 'large')
            <div class="mb-3 w-full lg:mb-0 lg:max-w-[400px]">
                <div class="overflow-hidden w-full h-14 rounded text-light bg-accent inline-flex justify-between text-accent-contrast">
                    <button wire:click="decrement"
                        class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5">
                        <i class="fa fa-minus"></i>
                    </button>
                    <div class="flex flex-1 items-center justify-center px-3 text-sm font-semibold">{{ $quantity }}
                    </div>
                    <button wire:click="increment"
                        class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5"
                        title="">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        @else
            <div
                class="flex overflow-hidden order-5 sm:order-4 w-9 sm:w-24 h-24 sm:h-10 bg-accent text-light rounded-full flex-col-reverse sm:flex-row absolute sm:relative bottom-0 sm:bottom-auto ltr:right-0 rtl:left-0 ltr:sm:right-auto ltr:sm:left-auto text-accent-contrast">
                <button wire:click="decrement"
                    class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 text-sm">
                    <i class="fa fa-minus"></i>
                </button>

                <div class="flex flex-1 items-center justify-center px-3 text-sm font-semibold">{{ $quantity }}</div>

                <button wire:click="increment"
                    class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 text-sm">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        @endif
    @else
        @if ($layout == 'large')
            <span class="left-2 bg-red-600 text-white text-sm font-bold px-2 py-1 rounded">
                {{ __trans('Out of Stock') }}
            </span>
        @elseif ($layout != 'cart')
            <span class="absolute w-full d-flex align-items-center justify-content-center text-center text-accent-contrast text-xs font-semibold product-list-out-of-stock-span">{{ __trans('Out of Stock') }}</span>
        @endif
    @endif
</div>
