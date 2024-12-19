<div class="top-searchbar-section bg-white top-0 z-50 w-full">
    <div>
        <div class="flex w-full items-center justify-between bg-light lg:h-22 lg:px-6">
            <div class="lg:absolute flex w-full items-center justify-center space-x-4 bg-light px-5 py-1.5">
                <form wire:submit.prevent="applyFilters" class="w-full lg:max-w-3xl relative">
                    <div class="relative flex rounded-md h-12">
                        <input 
                            type="text" 
                            autocomplete="off"
                            placeholder="{{ __trans('Search your products from here') }}"
                            class="search flex h-full w-full appearance-none rounded-lg text-sm text-heading placeholder-gray-500 transition bg-gray-100 ltr:pl-10 rtl:pr-10 border focus:border-accent focus:bg-light"
                            wire:model.live.debounce.250ms="search"
                            wire:focus="$set('isFocused', true)"
                            wire:blur="$set('isFocused', false)"
                        >
                        @if($search || $isFocused)
                            <button type="button" wire:click="clearSearch" class="absolute right-0 flex h-full w-10 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9l-6 6 1 1 6-6 6 6 1-1-6-6 6-6-1-1-6 6-6-6-1 1 6 6z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                    </div>

                    @if(!empty($suggestions))
                        <div class="absolute z-10 bg-white border border-gray-300 w-full mt-2 rounded-lg shadow-lg" style="overflow: auto;max-height: 350px;">
                            <ul>
                                @foreach($suggestions as $item)
                                <li class="group flex items-center justify-between p-2 hover:bg-gray-100 cursor-pointer transition duration-200">
                                    <a wire:navigate 
                                    href="{{ $item['type'] === 'category' 
                                                ? route('frontend.home', ['catid' => $item['id']]) 
                                                : route('frontend.product-detail', ['product_slug' => $item['slug']]) }}" 
                                    class="flex-1 text-gray-800">
                                        @if($item['type'] === 'category')
                                            <div>
                                                <span class="font-semibold text-black">{{ $item['name'] }}</span>
                                                <span class="text-gray-500 text-sm">({{ $item['count'] }} items)</span>
                                            </div>
                                        @else
                                            <div>
                                                <span class="font-medium">{{ $item['name'] }}</span>
                                                <span class="text-gray-500 text-sm">({{ __userCurrencySymbol() }}{{ $item['price'] }})</span>
                                            </div>
                                            <span class="text-gray-400 text-xs">{{ $item['category'] }}</span>
                                        @endif
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                </form>
            </div>
        </div>
    </div>
</div>
