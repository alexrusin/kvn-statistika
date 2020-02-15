<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157515914-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-157515914-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>КВН Статистика</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

</head>

<body class="flex items-center justify-center text-gray-800" style="background: #edf2f7;">
    <div id="app" class="font-sans bg-grey-lighter flex flex-col min-h-screen w-full relative">
        @include('layouts.nav')
        <div class="flex-grow container mx-auto px-4 pb-8">
            @yield('content')
        </div>
        @include('layouts.footer')
        <flash message="{{session('flash')}}"></flash>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>