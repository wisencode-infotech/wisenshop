<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | {{ config('app.name', 'Laravel') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="{{ config('app.name', 'Laravel') }}" name="description" />
        <meta content="{{ config('app.name', 'Laravel') }}" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/backend/images/favicon.ico')}}">
        @include('backend.layouts.head-css')
  </head>

    @yield('body')
    
    @yield('content')

    @include('backend.layouts.vendor-scripts')
    </body>
</html>