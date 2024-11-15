<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Installer - {{ config('app.name', 'WisenShop') }} @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('assets/installer/css/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/toastr.min.js') }}"></script>

    @yield('scripts')

    <script type="text/javascript" src="{{ asset('assets/installer/js/script.js') }}"></script>

</body>
</html>
