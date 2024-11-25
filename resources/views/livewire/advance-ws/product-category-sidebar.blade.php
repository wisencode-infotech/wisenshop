<div class="sticky h-full bg-gray-100 lg:w-[380px] xl:block top-32 xl:top-24 2xl:top-22">
    <div class="sidebar-inner">
        <div class="filter-close d-md-none">
            <span class="ti-close"></span>
        </div>
        <h3 class="sidebar-title">{{ __trans('Filter') }}</h3>

        <div class="sidebar-widget">
            <h4 class="widget-title">{{ __trans('Categories') }}</h4>
            <div class="sidebar-widget-body">
                <ul class="checkbox-categories-list"  x-data="{ selectedCategoryId: @entangle('selectedCategoryId') }">
                    @foreach ($product_categories as $category)
                        <li wire:key="category-{{ $category->id }}"
                            x-on:click="
                                selectedCategoryId = {{ $category->id }};
                                $wire.set('selectedCategoryId', selectedCategoryId); // Use Livewire's set method
                                $dispatch('category-selected', { category_id: selectedCategoryId })
                            ">
                            <label class="checkcontainer">
                                <input type="checkbox" 
                                    :checked="{ 'checked': selectedCategoryId === {{ $category->id }} }">
                                <span class="checkmark">{{ $category->name }}</span>
                            </label>
                            <span class="count">({{ $category->products()->count() }})</span>
                        </li>
                        @if ($category->subcategories()->count() > 0)
                            <ul class="subcategory">
                                @foreach ($category->subcategories as $sub_category)
                                    <li wire:key="category-{{ $sub_category->id }}"
                                        x-on:click="
                                            selectedCategoryId = {{ $sub_category->id }};
                                            $wire.set('selectedCategoryId', selectedCategoryId); // Use Livewire's set method
                                            $dispatch('category-selected', { category_id: selectedCategoryId })
                                        ">
                                        <label class="checkcontainer">
                                            <input type="checkbox" 
                                                :checked="{ 'checked': selectedCategoryId === {{ $sub_category->id }} }">
                                            <span class="checkmark">{{ $sub_category->name }}</span>
                                        </label>
                                        <span class="count">({{ $sub_category->products()->count() }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Banner Section -->
    @if ($banner_settings && !empty($banner_settings['banner_image']))
    <a href="{{ !empty($banner_settings['banner_url']) ? $banner_settings['banner_url'] : '#' }}" class="text-decoration-none">
        <div class="container mt-2 mb-1 p-0">
            <div class="card border-0 shadow-sm home-sidebar-banner">
                <div class="row g-0 align-items-center {{ empty($banner_settings['banner_description']) ? 'justify-content-center' : '' }}">
                    <!-- Image Section -->
                    <div class="{{ empty($banner_settings['banner_description']) ? 'col-md-12' : 'col-md-12' }}">
                        <img 
                            src="{{ Storage::url($banner_settings['banner_image']) }}" 
                            class="img-fluid rounded-start" 
                            alt="Banner Image">
                    </div>
    
                    <!-- Description Section -->
                    @if (!empty($banner_settings['banner_description']))
                        <div class="col-md-12 p-3">
                            <p class="text-muted small text-center text-md-start">
                                {!! nl2br($banner_settings['banner_description']) !!}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </a>
    @endif
</div>
