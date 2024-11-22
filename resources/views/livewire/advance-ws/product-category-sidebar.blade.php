<div class="sticky h-full bg-gray-100 lg:w-[380px] xl:block top-32 xl:top-24 2xl:top-22">
    <div class="sidebar-inner">
        <div class="filter-close d-md-none">
            <span class="ti-close"></span>
        </div>
        <h3 class="sidebar-title">Filter</h3>

        <div class="sidebar-widget">
            <h4 class="widget-title">Categories</h4>
            <div class="sidebar-widget-body">
                <ul class="checkbox-categories-list">
                    @foreach ($product_categories as $category)
                        <li>
                            <label class="checkcontainer">
                                <input type="checkbox">
                                <span class="checkmark">{{ $category->name }}</span>
                            </label>
                            <span class="count">({{ $category->products()->count() }})</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

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
