<!DOCTYPE html>
<html lang="{{ __documentLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __appActiveTheme() }} @yield('title', config('app.name'))</title>

    @include('partials.seo')

    <link rel="icon" href="{{  asset(__setting('fav_logo')) }}" type="image/png">

    {!! Cache::rememberForever('site-customizer', function () {
        return view('frontend.layouts.site-customizer')->render();
    }) !!}

    {!! __includeThemePartialView('head', 'before-mix') !!}

    <link rel="stylesheet" href="{{ mix('assets/frontend/theme/mix.css') }}">

    {!! __includeThemePartialView('head', 'after-mix') !!}

    @livewireStyles
</head>
<body>

    {!! __includeThemePartialView('body', 'container', compact('slot'), true) !!}

    @livewireScripts

    <script>
        
        var _app_base_url = '{{ url("/") }}';
        var _user_is_loggedin = {{ auth()->check() ? 'true' : 'false' }};

    </script>

    {!! __includeThemePartialView('after-body', 'before-mix') !!}

    <script src="{{ mix('assets/frontend/theme/mix.js') }}"></script>

    {!! __includeThemePartialView('after-body', 'after-mix') !!}

    @yield('scripts')

    {!! __includeThemePartialView('body', 'after-scripts') !!}

</body>
</html>
