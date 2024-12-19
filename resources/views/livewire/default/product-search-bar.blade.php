<div class="top-searchbar-section bg-white top-0 z-50 w-full border-t">
    <div>
        <div class="flex w-full items-center justify-between bg-light lg:h-22 lg:px-6">
            <div class="lg:absolute flex w-full items-center justify-center space-x-4 bg-light px-5 py-1.5">
                <form wire:submit.prevent="applyFilters" class="w-full lg:max-w-3xl relative">
                    <div class="relative flex rounded-md h-12">
                        <input 
                            type="text" 
                            autocomplete="off"
                            placeholder="{{ __trans('Search your products from here') }}"
                            class="search item-center flex h-full w-full appearance-none overflow-hidden truncate rounded-lg text-sm text-heading placeholder-gray-500 transition duration-300 ease-in-out focus:outline-0 focus:ring-0 search-minimal bg-gray-100 ltr:pl-10 rtl:pr-10 ltr:pr-4 rtl:pl-4 ltr:md:pl-14 rtl:md:pr-14 border border-transparent focus:border-accent focus:bg-light"
                            wire:model.live.debounce.250ms="search"
                            wire:focus="$set('isFocused', true)"
                            wire:blur="$set('isFocused', false)"
                        >
                        @if($search || $isFocused)
                            <button type="button" wire:click="clearSearch" class="clear-search absolute flex h-full w-10 items-center justify-center text-body transition-colors duration-200 hover:text-accent-hover focus:text-accent-hover focus:outline-0 ltr:right-0 rtl:left-0 md:w-14">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
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
