<div class="top-searchbar-section bg-white top-0 z-50 w-full transition-all border-b border-border-200 shadow-sm h-15 lg:h-22 is-scrolling">
    <div>
        <div class="flex w-full items-center justify-between bg-light transition-transform duration-300 lg:h-22 lg:px-6 2xl:px-8 lg:absolute lg:border-0 lg:bg-transparent lg:shadow-none">
            
            <div class="lg:absolute top-0 z-20 flex h-full w-full items-center justify-center space-x-4 border-b-accent-300 bg-light px-5 py-1.5 ltr:left-0 rtl:right-0 rtl:space-x-reverse lg:border lg:bg-opacity-30">
                <form wire:submit.prevent="applyFilters" class="w-full lg:max-w-3xl relative">
                    <div class="relative flex rounded-md h-12">
                    <label for="grocery-search-hseader" class="sr-only">{{ __trans('Search your products from here') }}</label>
                        <input 
                            id="grocery-search-header"
                            type="text" 
                            autocomplete="off"
                            placeholder="{{ __trans('Search your products from here') }}"
                            class="search item-center flex h-full w-full appearance-none overflow-hidden truncate rounded-lg text-sm text-heading placeholder-gray-500 transition duration-300 ease-in-out focus:outline-0 focus:ring-0 search-minimal bg-gray-100 ltr:pl-10 rtl:pr-10 ltr:pr-4 rtl:pl-4 ltr:md:pl-14 rtl:md:pr-14 border border-transparent focus:border-accent focus:bg-light"
                            wire:model.live.debounce.250ms="search"
                        >
                        @if($search || $isFocused)
                            <button type="button" class="clear-search absolute flex h-full w-10 items-center justify-center text-body transition-colors duration-200 hover:text-accent-hover focus:text-accent-hover focus:outline-0 ltr:right-0 rtl:left-0 md:w-14">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9l-6 6 1 1 6-6 6 6 1-1-6-6 6-6-1-1-6 6-6-6-1 1 6 6z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif

                        <button type="button" class="absolute flex h-full w-10 items-center justify-center text-body transition-colors duration-200 hover:text-accent-hover focus:text-accent-hover focus:outline-0 ltr:left-0 rtl:right-0 md:w-14">
                            <span class="sr-only">{{ __trans('Search') }}</span>
                            <svg viewBox="0 0 17.048 18" class="h-4 w-4">
                                <path d="M380.321,383.992l3.225,3.218c.167.167.341.329.5.506a.894.894,0,1,1-1.286,1.238c-1.087-1.067-2.179-2.131-3.227-3.236a.924.924,0,0,0-1.325-.222,7.509,7.509,0,1,1-3.3-14.207,7.532,7.532,0,0,1,6,11.936C380.736,383.462,380.552,383.685,380.321,383.992Zm-5.537.521a5.707,5.707,0,1,0-5.675-5.72A5.675,5.675,0,0,0,374.784,384.513Z" transform="translate(-367.297 -371.285)" fill="currentColor"></path>
                            </svg>
                        </button>
                    </div>

                    @if(!empty($suggestions))
                        <div class="filter-suggestion-box absolute z-10 bg-white border border-gray-300 w-full mt-2 rounded-lg shadow-lg" style="overflow: auto;max-height: 350px;">
                            <ul>
                                @foreach($suggestions as $item)
                                <li class="group flex items-center justify-between p-2 hover:bg-gray-100 cursor-pointer transition duration-200" style="padding-top: 4px;padding-bottom: 4px;">
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
                                            <div style="line-height:1px;">
                                                <div>
                                                    <span class="font-medium">{{ $item['name'] }}</span>
                                                    <span class="text-gray-500 text-sm">({{ __userCurrencySymbol() }} {{ $item['price'] }})</span>
                                                </div>
                                                <span class="text-gray-400 text-xs">{{ $item['category'] }}</span>
                                            </div>
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
