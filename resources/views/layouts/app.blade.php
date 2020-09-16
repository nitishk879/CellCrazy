<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config("app.name") }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("assets/images/favicon.ico") }}">

    <link rel="stylesheet" href="{{ asset("css/vendor/vendor.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/plugins/plugins.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.min.css") }}">
</head>
<body>
<div id="app">
    <!-- Header Section Start From Here -->
    <header class="header-wrapper">
        @section('header')
            @include('layouts.header')
        @show
    </header>
    <!-- Header Section End Here -->
    <!-- OffCanvas Wishlist Start -->
    <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
        @include('layouts.wishlist')
    </div>
    <!-- OffCanvas Wishlist End -->
    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        @include('layouts.mini-cart')
    </div>
    <!-- OffCanvas Cart End -->

    <!-- Cart Overlay -->
    <div class="cart-overlay"></div>

    <!-- Hero Section Start -->
    @yield('hero-section')
    <!-- Hero Section End -->

    @include('layouts.notification')

    @hasSection('breadcrumb')
    <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-content">
                            @yield('breadcrumb')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Breadcrumb Area End-->
    @endif
    @yield('content')
    <!-- Subscribe Section Start -->
    @yield('subscriber-section')
    <!-- Subscribe Section End -->

    <!-- Footer Area Start -->
    <div class="footer-area">
        @include('layouts.footer')
    </div>
    <!-- Footer Area End -->
</div>

<!-- jQuery JS -->
<script src="{{ asset("js/vendor/vendor.min.js") }}"></script>
<script src="{{ asset("js/plugins/plugins.min.js") }}"></script>
<script src="{{ asset("js/main.js") }}"></script>
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
@yield('scripts')
</body>
</html>
