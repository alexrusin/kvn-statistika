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

    /**
    * Function that registers a click on an outbound link in Analytics.
    * This function takes a valid URL string as an argument, and uses that URL string
    * as the event label. Setting the transport method to 'beacon' lets the hit be sent
    * using 'navigator.sendBeacon' in browser that support it.
    */
    var getOutboundLink = function(url) {
        gtag('event', 'click', {
            'event_category': 'outbound',
            'event_label': url,
            'transport_type': 'beacon',
            'event_callback': function(){document.location = url;}
        });
    }

    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if(isset($metaDescription))
        <meta name="description" content="{{$metaDescription}}"> 
    @else
        <meta name="description" content="Статистические данные о КВН">
    @endif

    @yield('blog_meta_tags')

    @if(isset($pageTitle)) 
        <title>{{ $pageTitle }} </title>
    @else 
        <title>КВН Статистика</title>
    @endif

   
    <meta name="yandex-verification" content="b135efb827d9e593" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('styles')

</head>

<body class="flex items-center justify-center text-gray-800" style="background: #edf2f7;">
    <div id="app" class="relative flex flex-col w-full min-h-screen font-sans bg-grey-lighter">
        @include('layouts.nav')
        <div class="container flex-grow px-4 pb-8 mx-auto">
            @yield('content')
        </div>
        @include('layouts.footer')
        <flash message="{{session('flash')}}"></flash>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>