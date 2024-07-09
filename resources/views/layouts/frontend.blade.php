<!doctype html>
<html lang="zxx">

<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Habits Hive | Landing Page</title>

    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/beeicon.png') }}" type="images/x-icon" />

    <!-- css include -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    @yield('css')
</head>

<body>

    <div id="xb-loadding" class="xb-loader">
        <div class="xb-dual-ring"></div>
    </div>

    <div class="xb-cursor tx-js-cursor">
        <div class="xb-cursor-wrapper">
            <div class="xb-cursor--follower xb-js-follower"></div>
        </div>
    </div>

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <div class="body_wrap">

        <!-- header start -->
        @include('include.frontend.navbar')
        <!-- header end -->

        {{-- content start --}}
        @yield('content')
        {{-- content end --}}
        
        {{-- footer start --}}
        @include('include.frontend.footer')
        {{-- footer end --}}

    </div>

    <!-- jquery include -->
    <script src="{{ asset('frontend/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/cursor.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scrollspy.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @yield('js')
    @stack('name')
</body>

</html>
