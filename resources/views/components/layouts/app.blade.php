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

    @if (request()->routeIs('frontend.home'))
        @livewire('mobile-header-filter')
    @endif

    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/76125ef05e.js" crossorigin="anonymous"></script>

    @yield('scripts')

    <script>

        $(document).on('click', '.mobile-filter-btn', function() {
            const filter_section = $('.mobile-header-filter-section');
            filter_section.toggleClass('hidden');
        });

        $(document).on('click', '.mobile-header-filter-close-btn', function() {
            const filter_section = $('.mobile-header-filter-section');
            filter_section.toggleClass('hidden');
        });
         
    </script>
</body>
</html>
