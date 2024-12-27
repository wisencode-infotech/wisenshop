<div class="sticky hidden h-full bg-gray-100 lg:w-[380px] xl:block top-32 xl:top-24 2xl:top-22">
    <aside class="hidden h-full w-full bg-light lg:sticky lg:w-[380px] lg:bg-gray-100 xl:block  lg:top-22">

        <div data-overlayscrollbars-initialize="" class="os-theme-thin-dark" style="max-height:calc(100vh - 88px)"
            data-overlayscrollbars="host">
            <div class="os-size-observer">
                <div class="os-size-observer-listener ltr"></div>
            </div>
            <div data-overlayscrollbars-contents="" data-overlayscrollbars-viewport="scrollbarHidden"
                style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; top: 0px; right: auto; left: 0px; width: calc(100% + 0px); padding: 0px; overflow-y: scroll;">
                <div class="py-6 px-4">

                <div x-data="{ selectedCategoryId: @entangle('selectedCategoryId'), showSubcategories: @entangle('showSubcategories') }">
                    <!-- Parent Categories -->
                    <div x-show="!showSubcategories" class="grid grid-cols-2 gap-4">
                        @foreach ($product_categories as $category)
                            <div wire:key="category-{{ $category->id }}" 
                                class="text-center rounded-lg bg-light py-4 flex flex-col items-center justify-start relative overflow-hidden cursor-pointer product_category shadow-sm" 
                                role="button"
                                :class="{ 'active': selectedCategoryId === {{ $category->id }} }"
                                x-on:click="
                                    selectedCategoryId = {{ $category->id }};
                                    $wire.set('selectedCategoryId', selectedCategoryId); // Use Livewire's set method
                                    $dispatch('category-selected', { category_id: selectedCategoryId });
                                ">
                                
                            <!-- category products count badge -->
                            @if (($category_products_count = $category->total_products) > 0)
                                <div class="absolute top-2 right-2 bg-green-light text-accent text-xs font-bold px-2 py-1 rounded-full">
                                    {{ $category_products_count }}
                                </div>
                            @endif
                        
                            <div class="w-full h-20 flex items-center justify-center">
                                <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="h-20" />
                            </div>
                            <span class="text-sm font-semibold text-heading text-center pt-4 px-2.5 block">
                                {{ \Str::limit($category->name, 18) }}
                            </span>
                        </div>
                        @endforeach
                    </div>

                    <!-- Subcategories -->
                    <div x-show="showSubcategories">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center rounded-lg bg-light py-4 flex flex-col items-center justify-start relative overflow-hidden cursor-pointer product_category shadow-sm" role="button"
                                x-on:click="showSubcategories = false; selectedCategoryId = selectedCategoryId; $wire.goBack();">
                                <div class="w-full h-20 flex items-center justify-center">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="h-12 w-12"
                                >
                                    <path d="M15 18l-6-6 6-6" />
                                </svg>
                                </div>
                                <span class="text-sm font-semibold text-heading text-center pt-4 px-2.5 block">{{ __trans('back') }}</span>
                            </div>
                            @foreach ($subcategories as $subcategory)
                                <div wire:key="category-{{ $subcategory->id }}" class="text-center rounded bg-light py-4 flex flex-col items-center justify-start relative overflow-hidden cursor-pointer product_category" role="button"
                                    :class="{ 'active': selectedCategoryId === {{ $subcategory->id }} }"
                                    x-on:click="
                                        selectedCategoryId = {{ $subcategory->id }};
                                        $dispatch('category-selected', { category_id: selectedCategoryId })
                                    ">

                                    <!-- subcategory products count badge -->
                                    @if (($subcategory_products_count = $subcategory->products()->count()) > 0)
                                        <div class="absolute top-2 right-2 bg-green-light text-accent text-xs font-bold px-2 py-1 rounded-full">
                                            {{ $subcategory_products_count }}
                                        </div>
                                    @endif

                                    <div class="w-full h-20 flex items-center justify-center">
                                        <img src="{{ $subcategory->image_url }}" class="h-20" />
                                    </div>
                                    <span class="text-sm font-semibold text-heading text-center pt-4 px-2.5 block">{{ \Str::limit($subcategory->name, 18) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                </div>
            </div>
            <div
                class="os-scrollbar os-scrollbar-horizontal os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-unusable os-scrollbar-auto-hide-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="width: 100%;"></div>
                </div>
            </div>
            <div
                class="os-scrollbar os-scrollbar-vertical os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-visible os-scrollbar-auto-hide-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="height: 67.347%;"></div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Banner Section -->
    @if ($banner_settings && !empty($banner_settings['banner_image']))
    <a href="{{ !empty($banner_settings['banner_url']) ? $banner_settings['banner_url'] : '#' }}">
        <div class="max-w-4xl mx-auto mt-2 mb-1 p-0 bg-white rounded-lg shadow-lg border border-gray-200 home-sidebar-banner">
            <div 
                class="flex {{ empty($banner_settings['banner_description']) ? 'items-center' : 'items-start' }} 
                            justify-between flex-col gap-4 md:flex-row">
                <div 
                    class="{{ empty($banner_settings['banner_description']) ? 'w-full' : 'w-auto' }} 
                           bg-gray-100 rounded-lg shadow-md overflow-hidden" >
                    <img 
                        src="{{ Storage::url($banner_settings['banner_image']) }}" 
                        class="w-full h-full object-cover" 
                        alt="Banner Image" />

                    @if (!empty($banner_settings['banner_description']))
                        <div class="flex-1 md:ml-6 p-2">
                            <p class="text-lg text-blue-700 text-center md:text-left text-sm">
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
