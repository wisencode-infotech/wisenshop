<button  wire:navigate href="{{ route('frontend.cart') }}"
    data-variant="custom"
    class="hidden xl:flex relative inline-flex items-center justify-center rounded-full border border-border-200 bg-light text-accent transition duration-300 ease-in-out hover:bg-accent-hover focus:outline-none hover:text-white focus:ring-2 focus:ring-accent-700 h-10 w-10">
    <i class="fa fa-shopping-cart text-lg"></i>
    <span class="sr-only">{{ __trans('Cart') }}</span>
    <span class="absolute -top-2 right-0 inline-flex items-center justify-center w-5 h-5 font-bold text-white bg-red-500 rounded-full text-[10px]">
        {{ $itemCount }}
    </span>
</button>
