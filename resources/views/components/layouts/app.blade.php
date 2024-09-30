<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="{{asset('assets/frontend/css/main.css')}}" data-n-g="" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">

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

                    @if (!request()->routeIs('frontend.home'))
                        @livewire('footer')
                    @endif
                </div>
            </main>
        </div>
    </div>

    @livewireScripts
</body>
</html>
