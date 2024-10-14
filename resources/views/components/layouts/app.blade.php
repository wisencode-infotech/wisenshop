<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="icon" href="{{  asset(__setting('fav_logo')) }}" type="image/png"> 

    @include('components.layouts.site-customizer')

    <link rel="stylesheet" href="{{ mix('assets/frontend/css/mix.css') }}">

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

                    <div wire:ignore>
                        @livewire('mobile-navbar')
                    </div>

                    <div wire:ignore>
                        @if (!request()->routeIs('frontend.home'))
                            @livewire('footer')
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>

    
    <div wire:ignore>
        @livewire('mobile-header-filter')
    </div>

    <div wire:ignore>
        @livewire('notification-toast')
    </div>

    @livewireScripts

    <script>
        
        var _app_base_url = '{{ url("/") }}';
        var _user_is_loggedin = {{ auth()->check() ? 'true' : 'false' }};

    </script>

    <script src="{{ mix('assets/frontend/js/mix.js') }}"></script>

    @yield('scripts')

    <script src="https://kit.fontawesome.com/76125ef05e.js" crossorigin="anonymous"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
        };
    </script>

</body>
</html>
