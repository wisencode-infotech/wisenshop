<meta name="keywords" content="@yield('meta:keywords', config('app.name'))">
    <meta name="description" content="@yield('meta:description', config('app.name'))">

    <meta property="og:title" content="@yield('title', config('app.name'))">
    <meta property="og:description" content="@yield('meta:description', config('app.name'))">
    <meta property="og:image" content="@yield('meta:og:image', asset(__setting('header_logo')))">
    <meta property="og:url" content="@yield('meta:og:url', url()->current())">