<button  wire:navigate href="{{ route('frontend.cart') }}"
    data-variant="custom"
    class="relative inline-flex items-center justify-center rounded-full border border-border-200 bg-light text-accent transition duration-300 ease-in-out hover:bg-accent-hover focus:outline-none focus:ring-2 focus:ring-accent-700 h-12 w-12">
    <i class="fa fa-shopping-cart text-lg"></i>
    <span class="sr-only">Cart</span>
    
    <!-- Badge for item count -->
    <span class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-500 rounded-full">
        {{ $itemCount }}
    </span>
</button>
