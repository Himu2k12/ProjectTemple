<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSS files -->
    <link rel="stylesheet" href="{{asset('assets/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/nice-select.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/meanmenu.css" media="all">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/default.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/font/flaticon.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/main.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/responsive.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
    <div id="app">
            @yield('content')

    </div>
</body>
</html>
