<div>
    <form onsubmit="return false;" class="position-relative">
        <div class="form-group mt-2">
            <input id="grocery-search-header" type="search" autocomplete="off" 
                placeholder="{{ __trans('Search your products from here') }}" 
                wire:model.live.debounce.250ms="search">

            @if($search || $isFocused)
                <button type="button" class="close-search clear-search"><span class="fa fa-close" style="font-size:32px"></span></button>
            @endif
        </div>

        @if(!empty($suggestions))
            <div class="filter-suggestion-box">
                <div wire:loading class="text-center mt-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <ul wire:loading.remove class="mt-2 mb-2">
                    @foreach($suggestions as $item)
                        <li class="category">
                            @if($item['type'] === 'category')
                                <a wire:navigate 
                                href="{{ route('frontend.home', ['catid' => $item['id']]) }}">
                                    <div class="category_link">
                                        <span>{{ $item['name'] }}</span>
                                        @if(empty($item['subcategories']))
                                            <span>({{ $item['count'] }} items)</span>
                                        @endif
                                    </div>
                                </a>

                                @if(!empty($item['subcategories']))
                                    <ul>
                                        @foreach($item['subcategories'] as $subcategory)
                                            <li class="subcategory">
                                                <a href="{{ route('frontend.home', ['catid' => $subcategory['id']]) }}" 
                                                class="flex justify-between items-center">
                                                    <span>{{ $subcategory['name'] }}</span>
                                                    <span>({{ $subcategory['count'] }})</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            @else
                            <a wire:navigate 
                            href="{{ route('frontend.product-detail', ['product_slug' => $item['slug']]) }}">
                                <div class="flex flex-col p-2 product-item" style="line-height: 1.1;">
                                    <div class="flex justify-between">
                                        <span>{{ $item['name'] }}</span>
                                        <span>{{ $item['category'] }}</span>
                                    </div>
                                    <span class="description">
                                        {{ __userCurrencySymbol() }} {{ $item['price'] }} | {{ \Str::limit($item['description'], 50) }}
                                    </span>
                                </div>
                            </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>
