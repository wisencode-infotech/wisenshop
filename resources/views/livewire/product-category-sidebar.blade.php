<div class="sticky hidden h-full bg-gray-100 lg:w-[380px] xl:block top-32 xl:top-24 2xl:top-22">
    <aside class="hidden h-full w-full bg-light lg:sticky lg:w-[380px] lg:bg-gray-100 xl:block  lg:top-22">

        <div data-overlayscrollbars-initialize="" class="os-theme-thin-dark" style="max-height:calc(100vh - 88px)"
            data-overlayscrollbars="host">
            <div class="os-size-observer">
                <div class="os-size-observer-listener ltr"></div>
            </div>
            <div data-overlayscrollbars-contents="" data-overlayscrollbars-viewport="scrollbarHidden"
                style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; top: 0px; right: auto; left: 0px; width: calc(100% + 0px); padding: 0px; overflow-y: scroll;">
                <div class="p-5">

                    <div x-data="{ selectedCategoryIds: @entangle('selectedCategoryIds') }" class="grid grid-cols-2 gap-4">
                        @foreach ($product_categories as $category)

                            <div class="text-center rounded bg-light py-4 flex flex-col items-center justify-start relative overflow-hidden cursor-pointer product_category"  role="button" :class="{ 'active': selectedCategoryIds.includes({{ $category->id }}) }"
                                x-on:click="
                                    if (selectedCategoryIds.includes({{ $category->id }})) {
                                        selectedCategoryIds = selectedCategoryIds.filter(id => id !== {{ $category->id }}); // Deselect category
                                    } else {
                                        selectedCategoryIds.push({{ $category->id }}); // Select category
                                    }
                                    $dispatch('category-selected', { category_id: selectedCategoryIds })
                                ">
                                <div class="w-full h-20 flex items-center justify-center">
                                   <img src="{{ $category->image_url }}" class="h-20"  />
                               </div>
                               <span class="text-sm font-semibold text-heading text-center px-2.5 block">{{ \Str::limit($category->name, 18) }}</span>
                           </div>

                        @endforeach
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

    <button
        class="products-filter fixed top-1/2 z-40 -mt-5 hidden flex-col items-center justify-center rounded bg-accent p-3 pt-3.5 text-sm font-semibold text-light shadow-900 transition-colors duration-200 focus:outline-0 ltr:left-0 rtl:rounded-tr-none rtl:rounded-br-none ltr:rug-0 ltr:rounded-tl-none ltr:rounded-bl-none lg:flex bg-opacity-80">
        <i class="fa fa-filter"></i>
    </button>

</div>
