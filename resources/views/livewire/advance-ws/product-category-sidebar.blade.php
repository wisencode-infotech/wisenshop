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
