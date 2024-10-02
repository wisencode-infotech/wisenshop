<div>
    @if ($layout == 'cart')
        <div class="flex overflow-hidden flex-col-reverse items-center w-8 h-24 bg-gray-100 text-heading rounded-full">
            <button wire:click="decrement"
                class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 hover:!bg-gray-100">
                <span class="sr-only">minus</span>
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 stroke-2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                </svg>
            </button>
            <div class="flex flex-1 items-center justify-center px-3 text-sm font-semibold !px-0 text-heading">
                {{ $quantity }}</div>
            <button wire:click="increment"
                class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 hover:!bg-gray-100"
                title="">
                <span class="sr-only">plus</span>
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="md:w-4.5 h-3.5 w-3.5 stroke-2.5 md:h-4.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </button>
        </div>
    @elseif ($layout == 'large')
        <div class="mb-3 w-full lg:mb-0 lg:max-w-[400px]">
            <div class="overflow-hidden w-full h-14 rounded text-light bg-accent inline-flex justify-between">
                <button wire:click="decrement"
                    class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5"><span
                        class="sr-only">minus</span><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-3 w-3 stroke-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                    </svg></button>
                <div class="flex flex-1 items-center justify-center px-3 text-sm font-semibold">{{ $quantity }}
                </div>
                <button wire:click="increment"
                    class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5"
                    title=""><span class="sr-only">plus</span><svg fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" class="md:w-4.5 h-3.5 w-3.5 stroke-2.5 md:h-4.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg></button>
            </div>
        </div>
    @else
        <div
            class="flex overflow-hidden order-5 sm:order-4 w-9 sm:w-24 h-24 sm:h-10 bg-accent text-light rounded-full flex-col-reverse sm:flex-row absolute sm:relative bottom-0 sm:bottom-auto ltr:right-0 rtl:left-0 ltr:sm:right-auto ltr:sm:left-auto">
            <button wire:click="decrement"
                class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-3 py-3 sm:px-2">
                <span class="sr-only">minus</span>
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 stroke-2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                </svg>
            </button>

            <div class="flex flex-1 items-center justify-center px-3 text-sm font-semibold">{{ $quantity }}</div>

            <button wire:click="increment"
                class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-3 py-3 sm:px-2">
                <span class="sr-only">plus</span>
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="md:w-4.5 h-3.5 w-3.5 stroke-2.5 md:h-4.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </button>
        </div>
    @endif

</div>
