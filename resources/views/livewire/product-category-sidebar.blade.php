<div class="sticky hidden h-full bg-gray-100 lg:w-[380px] xl:block top-32 xl:top-24 2xl:top-22">
    <aside class="hidden h-full w-full bg-light lg:sticky lg:w-[380px] lg:bg-gray-100 xl:block  lg:top-22">
        
        <div data-overlayscrollbars-initialize="" class="os-theme-thin-dark" style="max-height:calc(100vh - 88px)" data-overlayscrollbars="host">
            <div class="os-size-observer">
                <div class="os-size-observer-listener ltr"></div>
            </div>
            <div data-overlayscrollbars-contents="" data-overlayscrollbars-viewport="scrollbarHidden" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; top: 0px; right: auto; left: 0px; width: calc(100% + 0px); padding: 0px; overflow-y: scroll;">
                <div class="p-5">
                    
                    <div x-data="{ selectedCategoryIds: @entangle('selectedCategoryIds') }" class="grid grid-cols-2 gap-4">
                        @foreach($product_categories as $category)
                            <div 
                                class="relative text-center rounded flex items-end overflow-hidden cursor-pointer h-40 product_category" 
                                role="button" 
                                :class="{ 'active': selectedCategoryIds.includes({{ $category->id }}) }"
                                x-on:click="
                                    if (selectedCategoryIds.includes({{ $category->id }})) {
                                        selectedCategoryIds = selectedCategoryIds.filter(id => id !== {{ $category->id }}); // Deselect category
                                    } else {
                                        selectedCategoryIds.push({{ $category->id }}); // Select category
                                    }
                                    $dispatch('category-selected', { category_id: selectedCategoryIds })
                                "
                            >
                                <!-- Full Width and Height Image -->
                                <img src="{{ $category->image_url }}" class="absolute inset-0 w-full h-full object-cover" />
                                
                                <!-- Overlay for Title -->
                                <div class="absolute inset-0 flex items-end justify-center">
                                    <span class="text-sm md:text-md font-semibold text-accent-contrast text-center block bg-accent bg-opacity-40 w-full">
                                        {{ \Str::limit($category->name, 18) }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="os-scrollbar os-scrollbar-horizontal os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-unusable os-scrollbar-auto-hide-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="width: 100%;"></div>
                </div>
            </div>
            <div class="os-scrollbar os-scrollbar-vertical os-theme-dark os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-cornerless os-scrollbar-visible os-scrollbar-auto-hide-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="height: 67.347%;"></div>
                </div>
            </div>
        </div>
    </aside>

    <button class="products-filter fixed top-1/2 z-40 -mt-5 hidden flex-col items-center justify-center rounded bg-accent p-3 pt-3.5 text-sm font-semibold text-light shadow-900 transition-colors duration-200 focus:outline-0 ltr:left-0 rtl:rounded-tr-none rtl:rounded-br-none ltr:rug-0 ltr:rounded-tl-none ltr:rounded-bl-none lg:flex bg-opacity-80">
        <i class="fa fa-filter"></i>
    </button>

</div>

