<!-- Header Nav Start -->
<div class="header-nav">
    <div class="container">
        <div class="header-nav-wrapper d-md-flex d-sm-flex d-xl-flex d-lg-flex justify-content-between">
            <div class="header-static-nav">
                <p>{{ __("The UK's Fastest-Growing Phone Company") }}</p>
            </div>
            <div class="header-menu-nav">
                <ul class="menu-nav">
                    @guest
                        <li><a href="{{ route("login") }}">Sign in</a></li>
                    @else
                        <li><a href="">{{ Auth::user()->name }}</a></li>
                        <li><a href="my-account">My account</a></li>
                        <li>
                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="{{ __('Logout') }}"><i class="icofont icofont-logout"></i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                    <li><a href="">Track Your Order</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Header Nav End -->
<div class="header-top bg-white ptb-30px d-xl-block d-none">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="logo">
                    <a href="{{ route('/') }}"><img class="img-responsive" src="{{ asset("images/logo.png") }}" alt="{{ config('app.name') }}" /></a>
                </div>
            </div>
            <div class="col-md-10 align-self-center">
                <div class="header-right-element d-flex">
                    <div class="search-element media-body">
                        <form class="d-flex" action="{{ route("search") }}">
                            <div class="search-category">
                                <select name="category">
                                    <option value="">All categories</option>
                                    @isset($services)
                                        @foreach($services as $service)
                                            @foreach($service->categories as $category)
                                                <option value="{{ $category->slug ?? '' }}">{{ $category->name ?? '' }}</option>
                                            @endforeach
                                            @if($service->id>2) @break @endif
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Enter your search key ... " />
                            <button><i class="icon-magnifier"></i></button>
                        </form>
                    </div>
                    <div class="contact-link">
                        <div class="phone">
                            <p>Call us:</p>
                            <a href="tel:(+800)345678">{{ config("services.nexmo.sms_from") }}</a>
                        </div>
                    </div>
                    <!--Cart info Start -->
                    <div class="header-tools d-flex">
                        <div class="cart-info d-flex align-self-center">
                            <a href="#offcanvas-wishlist" class="heart offcanvas-toggle d-xs-none" id="sellNow" data-parent="@if(Session::has('wishlist')) {{ Session::get('wishlist')->quantity }} @endif"><i class="fas fa-cart-arrow-down"></i></a>
                            <a href="#offcanvas-cart" class="bag offcanvas-toggle" id="buyNow" data-parent="@if(Session::has('cart')) {{ Session::get('cart')->quantity }} @endif">
                                <i class="fas fa-cart-plus"></i> @if(Session::has('cart'))<span>{{ Session::get('cart')->totalPrice }}</span>@endif</a>
                        </div>
                    </div>
                </div>
                <!--Cart info End -->
            </div>
        </div>
    </div>
</div>
<!-- Header Nav End -->
<div class="header-menu bg-blue sticky-nav d-xl-block d-none padding-0px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 custom-col-2"></div>
            <div class="col-lg-9 custom-col-2">
                <div class="header-horizontal-menu">
                    <ul class="menu-content">
                        @guest
                            <li class="active"><a href="{{ route('/') }}">HOME</a></li>
                        @else
                            <li class="active"><a href="{{ route('home') }}">HOME</a></li>
                        @endguest
                        <li class="menu-dropdown"><a href="{{ route("services.show", "buy") }}">Shop <i class="ion-ios-arrow-down"></i></a>
                            <ul class="mega-menu-wrap">
                                <li class="mega-menu-title">
                                    <a href="{{ route("category.type", ['brand-new', 'phones']) }}">Brand New Devices</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route("category.item", ['brand-new', 'samsung-galaxy-s10e']) }}">{{ __('Samsung Galaxy S10E') }}</a> </li>
                                        <li><a href="{{ route("category.item", ['brand-new', 'samsung-galaxy-s10']) }}">{{ __('Samsung Galaxy S10') }}</a> </li>
                                        <li><a href="{{ route("category.item", ['brand-new', 'samsung-galaxy-a70-2019']) }}"></a>{{ __('Samsung Galaxy A70 2019') }}</li>
                                    </ul>
                                </li>
                                <li class="mega-menu-title">
                                    <a href="{{ route('service.brand', ['buy', 'apple']) }}">{{ __("Buy iPhone") }}</a>
                                    <ul>
                                        <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-11-pro-max']) }}">{{ __('Apple iPhone 11 Pro Max') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-11-pro']) }}">{{ __('Apple iPhone 11 Pro') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-11']) }}">{{ __('Apple iPhone 11') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-xs-max']) }}">{{ __('Apple iPhone XS Max') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-xs']) }}">{{ __('Apple iPhone XS') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-xr']) }}">{{ __('Apple iPhone XR') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-x']) }}">{{ __('Apple iPhone X') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-8-plus']) }}">{{ __('Apple iPhone 8 Plus') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-8']) }}">{{ __('Apple iPhone 8') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-7-plus']) }}">{{ __('Apple iPhone 7 Plus') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-7']) }}">{{ __('Apple iPhone 7') }}</a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu-title">
                                    <a href="{{ route('service.brand', ['buy', 'samsung']) }}">{{ __("Buy Samsung") }}</a>
                                    <ul>
                                        <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s10e']) }}">{{ __('Samsung Galaxy S10E') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s10']) }}">{{ __('Samsung Galaxy S10') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s9-plus']) }}">{{ __('Samsung Galaxy S9 Plus') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-note-8']) }}">{{ __('Samsung Galaxy Note 8') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s6']) }}">{{ __('Samsung Galaxy S6') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s7']) }}">{{ __('Samsung Galaxy S7') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s7-edge']) }}">{{ __('Samsung Galaxy S7 Edge') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s8']) }}">{{ __('Samsung Galaxy S8') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s9']) }}">{{ __('Samsung Galaxy S9') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s8-plus']) }}">{{ __('Samsung Galaxy S8 Plus') }}</a></li>
                                        <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s6-edge']) }}">{{ __('Samsung Galaxy S6 Edge') }}</a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu-title">
                                    <a href="{{ route("categories.show", "premium-accessories") }}">Premium Accessories</a>
                                    <ul>
                                        <li><a href="{{ route('accessories.category', ['apple', 'premium-accessories']) }}">{{ __('Apple Accessories') }}</a> </li>
                                        <li><a href="{{ route('accessories.category', ['samsung', 'premium-accessories']) }}">{{ __('Samsung Accessories') }}</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-dropdown"><a href="{{ route("services.show", "sell") }}">Sell<i class="ion-ios-arrow-down"></i></a>
                            <ul class="mega-menu-wrap">
                                <li class="mega-menu-title">
                                    <a href="{{ route('service.brand', ['sell', 'apple']) }}">{{ __("Sell iPhone") }}</a>
                                    <ul>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'apple-iphone-xr']) }}">{{ __('Apple iPhone XR') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'apple-iphone-x']) }}">{{ __('Apple iPhone X') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'apple-iphone-8-plus']) }}">{{ __('Apple iPhone 8 Plus') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'apple-iphone-8']) }}">{{ __('Apple iPhone 8') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'apple-iphone-7-plus']) }}">{{ __('Apple iPhone 7 Plus') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'apple-iphone-7']) }}">{{ __('Apple iPhone 7') }}</a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu-title">
                                    <a href="{{ route('service.brand', ['sell', 'samsung']) }}">{{ __("Sell Samsung") }}</a>
                                    <ul>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'samsung-galaxy-s10e']) }}">{{ __('Samsung Galaxy S10E') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'samsung-galaxy-s10']) }}">{{ __('Samsung Galaxy S10') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'samsung-galaxy-s9-plus']) }}">{{ __('Samsung Galaxy S9 Plus') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'samsung-galaxy-s9']) }}">{{ __('Samsung Galaxy S9') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'samsung-galaxy-s8-plus']) }}">{{ __('Samsung Galaxy S8 Plus') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'samsung-galaxy-s8']) }}">{{ __('Samsung Galaxy S8') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'samsung-galaxy-s7-edge']) }}">{{ __('Samsung Galaxy S7 Edge') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'samsung-galaxy-s7']) }}">{{ __('Samsung Galaxy S7') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'samsung-galaxy-s6-edge']) }}">{{ __('Samsung Galaxy S6 Edge') }}</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'samsung-galaxy-s6']) }}">{{ __('Samsung Galaxy S6') }}</a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu-title">
                                    <a href="{{ route('service.brand', ['sell', 'huawei']) }}">{{ __("Huawei") }}</a>
                                    <ul>
                                        <li><a href="{{ route("category.item", ["freshen-up", "huawei-p40-pro"]) }}">Huawei P40 Pro</a></li>
                                        <li><a href="{{ route("category.item", ["freshen-up", "huawei-p40-5g"]) }}">Huawei P40 5G</a></li>
                                        <li><a href="{{ route("category.item", ["freshen-up", "huawei-p30-pro"]) }}">Huawei P30 Pro</a></li>
                                        <li><a href="{{ route("category.item", ["freshen-up", "huawei-p20-pro"]) }}">Huawei P20 Pro</a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu-title">
                                    <a href="{{ route("category.type", ['freshen-up', 'watches']) }}">{{ __("Apple Watch") }}</a>
                                    <ul>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'series-5-44mm']) }}">Series 5 44mm</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'series-5-40mm']) }}">Series 5 40mm</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'series-4-44mm']) }}">Series 4 44mm</a></li>
                                        <li><a href="{{ route("category.item", ['freshen-up', 'series-4-40mm']) }}">Series 4 40mm</a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu-title pt-3"><a href="{{ route("sell-mac") }}">{{ __('MacBook') }}</a></li>
                                <li class="mega-menu-title pt-3"><a href="{{ route("sell-imac") }}">{{ __('iMac') }}</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('best-deals') }}">Deals</a></li>
                        <li><a href="{{ route('our-grade') }}">Our Grades</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                        <li><a href="{{ route("contact.us") }}">Contact Us</a></li>
                    </ul>
                </div>
                <!-- header horizontal menu -->
                <div class="intro-text-shipping text-right">
                    <div class="free-ship">Free Shipping</div>
                </div>
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</div>
<!-- header menu -->

<!-- Mobile Header Section Start -->
<div class="mobile-header d-xl-none sticky-nav bg-white ptb-10px">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <!-- Header Tools Start -->
            <div class="col">
                <div class="header-tools justify-content-end">
                    <div class="mobile-menu-toggle">
                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Header Tools End -->
            <!-- Header Logo Start -->
            <div class="col">
                <div class="header-logo">
                    <a href="{{ route("/") }}"><img class="img-responsive" src="{{ asset('theme/cell-crazy-logo.png') }}" alt="{{ config('app.name') }}" /></a>
                </div>
            </div>
            <!-- Header Logo End -->
            <div class="col">
                <div class="cart-info d-flex align-self-center">
                    <a href="#offcanvas-cart" class="bag offcanvas-toggle"><i class="icon-bag"></i>@if(Session::has('cart'))<span>{{ Session::get('cart')->quantity }}</span>@endif</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Category Start -->
<div class="mobile-search-area d-xl-none mb-15px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-element media-body">
                    <form class="d-flex" action="{{ route('search') }}">
                        <div class="search-category">
                            <select>
                                <option value="0">All categories</option>
                                @isset($services)
                                    @foreach($services as $service)
                                        @foreach($service->categories as $category)
                                            <option value="{{ $category->slug ?? '' }}">{{ $category->name ?? '' }}</option>
                                        @endforeach
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <input type="text" name="search" value="{{ old('search') ?? '' }}" placeholder="Enter your search key ... " />
                        <button><i class="icon-magnifier"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- OffCanvas Search Start -->
<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <div class="inner customScroll">
        <div class="head">
            <span class="title">&nbsp;</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="offcanvas-menu-search-form">
            <form action="#">
                <input type="text" placeholder="Search...">
                <button><i class="icon-magnifier"></i></button>
            </form>
        </div>
        <div class="offcanvas-menu">
            <ul>
                @guest
                    <li><a href="{{ route('/') }}"><span class="menu-text">HOME</span></a></li>
                @else
                    <li><a href="{{ route('home') }}"><span class="menu-text">HOME</span></a></li>
                @endguest
                <li><a href="{{ route("services.show", "buy") }}"><span class="menu-text">Shop</span></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route("category.type", ['brand-new', 'phones']) }}"><span class="menu-text">{{ __("Brand New") }}</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route("category.item", ['brand-new', 'samsung-galaxy-s10e']) }}">{{ __('Samsung Galaxy S10E') }}</a> </li>
                                <li><a href="{{ route("category.item", ['brand-new', 'samsung-galaxy-s10']) }}">{{ __('Samsung Galaxy S10') }}</a> </li>
                                <li><a href="{{ route("category.item", ['brand-new', 'samsung-galaxy-a70-2019']) }}"></a>{{ __('Samsung Galaxy A70 2019') }}</li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('service.brand', ['buy', 'apple']) }}"><span class="menu-text">{{ __("Buy iPhone") }}</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-11-pro-max']) }}">{{ __('Apple iPhone 11 Pro Max') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-11-pro']) }}">{{ __('Apple iPhone 11 Pro') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-11']) }}">{{ __('Apple iPhone 11') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-xs-max']) }}">{{ __('Apple iPhone XS Max') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-xs']) }}">{{ __('Apple iPhone XS') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-xr']) }}">{{ __('Apple iPhone XR') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-x']) }}">{{ __('Apple iPhone X') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-8-plus']) }}">{{ __('Apple iPhone 8 Plus') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-8']) }}">{{ __('Apple iPhone 8') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-7-plus']) }}">{{ __('Apple iPhone 7 Plus') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'apple-iphone-7']) }}">{{ __('Apple iPhone 7') }}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('service.brand', ['buy', 'samsung']) }}">{{ __("Buy Samsung") }}</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s10e']) }}">{{ __('Samsung Galaxy S10E') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s10']) }}">{{ __('Samsung Galaxy S10') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s9-plus']) }}">{{ __('Samsung Galaxy S9 Plus') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s9']) }}">{{ __('Samsung Galaxy S9') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s8-plus']) }}">{{ __('Samsung Galaxy S8 Plus') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s8']) }}">{{ __('Samsung Galaxy S8') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s7-edge']) }}">{{ __('Samsung Galaxy S7 Edge') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s7']) }}">{{ __('Samsung Galaxy S7') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s6-edge']) }}">{{ __('Samsung Galaxy S6 Edge') }}</a></li>
                                <li><a href="{{ route("category.item", ['refurbished', 'samsung-galaxy-s6']) }}">{{ __('Samsung Galaxy S6') }}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route("categories.show", "premium-accessories") }}">Premium Accessories</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('accessories.category', ['apple', 'premium-accessories']) }}">{{ __('Apple Accessories') }}</a> </li>
                                <li><a href="{{ route('accessories.category', ['samsung', 'premium-accessories']) }}">{{ __('Samsung Accessories') }}</a> </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ route("services.show", "sell") }}"><span class="menu-text">{{ __("Sell") }}</span></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route("category.type", ['freshen-up', 'phones']) }}">Phones</a></li>
                        <li><a href="{{ route("category.type", ['freshen-up', 'apple-watches']) }}">Apple Watches</a></li>
                        <li><a href="{{ route("sell-mac") }}">{{ __('MacBook') }}</a></li>
                        <li><a href="{{ route("sell-imac") }}">{{ __('iMac') }}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('best-deals') }}">Deals</a></li>
                <li><a href="{{ route('our-grade') }}">Our Grades</a></li>
                {{--                            <li><a href="{{ route('best-deals') }}">Blogs</a></li>--}}
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ route("contact.us") }}">Contact Us</a></li>
            </ul>
        </div>
        <div class="offcanvas-buttons mt-30px">
            <div class="header-tools d-flex">
                <div class="cart-info d-flex align-self-center">
                    <a href="" class="user"><i class="icon-user"></i></a>
                    <a href="" class="cartCanvas-toggle" data-parent="@if(Session::has('wishlist')) {{ Session::get('wishlist')->quantity }} @endif"><i class="icon-heart"></i></a>
                    <a href="" class="cartCanvas-toggle" data-parent="@if(Session::has('cart')) {{ Session::get('cart')->quantity }} @endif"><i class="icon-bag"></i></a>
                </div>
            </div>
        </div>
        <div class="offcanvas-social mt-30px">
            <ul>
                <li>
                    <a href="#"><i class="icon-social-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-instagram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-google"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- OffCanvas Search End -->
