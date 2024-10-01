<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="{{asset('assets/frontend/css/main.css')}}" data-n-g="" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @livewireStyles
</head>
<body>

    <div id="__next">
        <div dir="ltr">
            <main class="Pickbazar-version-undefined">   
                <div class="flex min-h-screen flex-col bg-gray-100 transition-colors duration-150">  
                    @livewire('header')
                    
                    <!-- Page Content -->
                    <div class="min-h-screen">
                        {{ $slot }}
                    </div>

                    @livewire('mobile-navbar')

                    @if (!request()->routeIs('frontend.home'))
                        @livewire('footer')
                    @endif
                </div>
            </main>
        </div>
    </div>

    @livewire('mobile-header-filter')

    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/76125ef05e.js" crossorigin="anonymous"></script>

    @yield('scripts')

    <script>

        $(document).on('click', '.mobile-filter-btn', function() {
            const filter_section = $('.mobile-header-filter-section');
            const mobile_filter_products_drawer_section = $('.mobile-filter-products-drawer-section');
            filter_section.removeClass('hidden');
            mobile_filter_products_drawer_section.removeClass('hidden');
        });

        $(document).on('click', '.mobile-header-filter-close-btn', function() {
            const filter_section = $('.mobile-header-filter-section');
            const mobile_filter_products_drawer_section = $('.mobile-filter-products-drawer-section');
            filter_section.addClass('hidden');
            mobile_filter_products_drawer_section.addClass('hidden');
        });

        $(document).on('click', '.mobile-pages-drawer-btn', function() {
            const filter_section = $('.mobile-header-filter-section');
            const mobile_filter_products_drawer_section = $('.mobile-pages-drawer-section');
            filter_section.removeClass('hidden');
            mobile_filter_products_drawer_section.removeClass('hidden');
        });

        $(document).on('click', '.mobile-header-filter-close-btn', function() {
            const filter_section = $('.mobile-header-filter-section');
            const mobile_filter_products_drawer_section = $('.mobile-pages-drawer-section');
            filter_section.addClass('hidden');
            mobile_filter_products_drawer_section.addClass('hidden');
        });

        $(document).on('click', '.top-product-search-btn', function() {
            const filter_section = $('.top-product-search-bar');
            filter_section.removeClass('hidden');
        });
        
         
    </script>
</body>
</html>
