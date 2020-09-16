@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <!-- Static Area Start -->
    <div class="static-area mtb-10px">
        <div class="container">
            <div class="static-area-wrap">
                @if($service->id==1)
                    <div class="col-md-12">
                        <div class="row justify-content-center bg-blue">
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-truck fa-2x text-white pb-1"></i>
                                <h6 class="text-white text-bold">Free Delivery</h6>
                                <p>24-48 Hr Dispatch</p>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-circle-notch fa-2x text-white pb-1"></i>
                                <h6 class="text-white text-bold">Extended Warranty</h6>
                                <p>12 Month Cover</p>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-check-circle fa-2x text-white pb-1"></i>
                                <h6 class="text-white text-bold">14 Day Returns</h6>
                                <p>No Fuss Guarantee</p>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-credit-card fa-2x text-white pb-1"></i>
                                <h6 class="text-white text-bold">Easy Checkout</h6>
                                <p>Paypal Accepted</p>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-thumbs-up fa-2x text-white pb-1"></i>
                                <h6 class="text-white text-bold">Fully Tested</h6>
                                <p>Pristine Devices</p>
                            </div>
                        </div>
                    </div>
                @elseif($service->id==2)
                    <div class="col-md-12">
                        <div class="row justify-content-center bg-blue">
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-quote-left fa-2x text-white pb-2"></i>
                                <h6 class="text-white text-bold">Instant Quote</h6>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-truck-loading fa-2x text-white pb-2"></i>
                                <h6 class="text-white text-bold">Free Pickup</h6>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-check-circle fa-2x text-white pb-2"></i>
                                <h6 class="text-white text-bold">All Conditions Accepted</h6>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-credit-card fa-2x text-white pb-2"></i>
                                <h6 class="text-white text-bold">Best Price Promise</h6>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-thumbs-up fa-2x text-white pb-2"></i>
                                <h6 class="text-white text-bold">Same Day Payment</h6>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="row justify-content-center bg-blue">
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-truck fa-2x text-white pb-2"></i>
                                <h4 class="text-white text-bold">Free Pickup & Delivery</h4>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-gears fa-2x text-white pb-2"></i>
                                <h4 class="text-white text-bold">Any Device Repaired</h4>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-quote-left fa-2x text-white pb-2"></i>
                                <h4 class="text-white text-bold">Get Quote Online</h4>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-credit-card fa-2x text-white pb-2"></i>
                                <h4 class="text-white text-bold">Genuine Quality Parts</h4>
                            </div>
                            <div class="col-md-2 col-12 bg-blue text-white text-center p-3">
                                <i class="fas fa-thumbs-up fa-2x text-white pb-2"></i>
                                <h4 class="text-white text-bold">Pay After Repair</h4>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Static Area End -->
    <!-- Single Product Section Start -->
    <div class="shop-category-area">
        <div class="container mt-3">
            <div class="row justify-content-center">
                @foreach($service->categories as $category)
                    <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                        <article class="list-product">
                            <div class="img-block">
                                <a href="{{ route("categories.show", $category->slug) }}" class="thumbnail">
                                    <img class="first-img" src="{{ asset("storage/{$service->slug}/{$category->slug}-phone.jpg") }}" alt="" />
                                </a>
                            </div>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="{{ route("categories.show", $category->slug) }}"><span>{{ $category->name }}</span></a>
                            </div>
                        </article>
                    </div>
                @endforeach
                @foreach($brands as $brand)
                    <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                        <article class="list-product">
                            <div class="img-block">
                                <a href="{{ route("service.brand", [$service->slug, $brand->slug]) }}" class="thumbnail">
                                    <img class="first-img" src="{{ asset("storage/{$service->slug}/{$brand->slug}-phone.jpg") }}" alt="" />
                                </a>
                            </div>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="{{ route("service.brand", [$service->slug, $brand->slug]) }}"><span>{{ $brand->name }}</span></a>
                            </div>
                        </article>
                    </div>
                @endforeach
                @php $category = $service->id ==1 ? $service->categories[1]['slug'] : $service->categories[0]['slug'] @endphp
                @if($service->id==2)
                    <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                        <article class="list-product">
                            <div class="img-block">
                                <a href="{{ route("category.type", [$category, 'watches']) }}" class="thumbnail">
                                    <img class="first-img" src="{{ asset("storage/{$service->slug}/apple-watches.jpg") }}" alt="{{ __('Apple Watches') }}"/>
                                </a>
                            </div>
                            <div class="product-decs">
                                <a class="inner-link" href="{{ route("category.type", [$category, 'watches']) }}"><span>{{ __('Apple Watches') }}</span></a>
                            </div>
                        </article>
                    </div>
                @endif
                @if($service->id==2)
                    <div class="col-xl-3 col-md-4 col-sm-6 col-6 text-center">
                        <article class="list-product">
                            <div class="img-block">
                                <a href="{{ route("sell-mac") }}" class="thumbnail">
                                    <img class="first-img" src="{{ asset("storage/{$service->slug}/sell-mac.jpg") }}" alt="{{ __('mac') }}"/>
                                </a>
                            </div>
                            <div class="product-decs">
                                <a class="inner-link" href="{{ route("sell-mac") }}"><span>{{ __('Mac Book') }}</span></a>
                            </div>
                        </article>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6 col-6 text-center">
                        <article class="list-product">
                            <div class="img-block">
                                <a href="{{ route("sell-imac") }}" class="thumbnail">
                                    <img class="first-img" src="{{ asset("storage/{$service->slug}/imac.jpg") }}" alt="{{ __('iMac') }}"/>
                                </a>
                            </div>
                            <div class="product-decs">
                                <a class="inner-link" href="{{ route("sell-imac") }}"><span>{{ __('iMac') }}</span></a>
                            </div>
                        </article>
                    </div>
                @endif
                @if($service->id==3)
                    <div class="col-xl-3 col-md-4 col-sm-6 col-6 text-center">
                        <article class="list-product">
                            <div class="img-block">
                                <a href="{{ route("category.item", ['repair', 'mackbook']) }}" class="thumbnail">
                                    <img class="first-img" src="{{ asset("storage/{$service->slug}/sell-mac.jpg") }}" alt="Mac Book"/>
                                </a>
                            </div>
                            <div class="product-decs">
                                <a class="inner-link" href="{{ route("category.item", ['repair', 'mackbook']) }}"><span>{{ __('Mac Book') }}</span></a>
                            </div>
                        </article>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6 col-6 text-center">
                        <article class="list-product">
                            <div class="img-block">
                                <a href="{{ route("category.item", ['repair', 'imac']) }}" class="thumbnail">
                                    <img class="first-img" src="{{ asset("storage/{$service->slug}/imac.jpg") }}" alt="iMac"/>
                                </a>
                            </div>
                            <div class="product-decs">
                                <a class="inner-link" href="{{ route("category.item", ['repair', 'imac']) }}"><span>{{ __('Mac Book') }}</span></a>
                                <h2><a href="" class="product-link">{{ __("iMac") }}</a></h2>
                            </div>
                        </article>
                    </div>
                @endif
            </div>
            @if($service->id==1)
                <div class="row pt-30 justify-content-center bg-gray">
                    <div class="col-lg-4 col-md-6 col-12 mb-30 text-center pb-3">
                        <i class="fas fa-mobile fa-4x text-dark"></i>
                        <h4 class="py-3 color-theme">Fully Tested</h4>
                        <p class="text-dark font-weight-bolder">Both our ‘good’ and ‘pristine’ condition phones are in excellent working order and have passed our 30-point quality checklist.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-30 text-center pb-3">
                        <i class="fas fa-unlock-alt fa-4x text-dark"></i>
                        <h4 class="py-3 color-theme">Ready-To-Use</h4>
                        <p class="text-dark font-weight-bolder">All our devices are restored to factory settings and are unlocked on all networks – so just pop your SIM in and you’re good to go!</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-30 text-center pb-3">
                        <i class="fas fa-handshake fa-4x text-dark"></i>
                        <h4 class="py-3 color-theme">12 Month Warranty</h4>
                        <p class="text-dark font-weight-bolder">We stand behind the quality of our devices. That’s why we offer a comprehensive warranty should anything go wrong with your device.</p>
                    </div>
                </div>
            @elseif($service->id==2)
                <div class="row pt-50 justify-content-center bg-gray">
                    <div class="col-lg-4 col-md-6 col-12 mb-30 text-center pb-3">
                        <i class="fas fa-credit-card fa-4x text-muted"></i>
                        <h4 class="pt-3 color-theme pb-3">Get Instant Price</h4>
                        <p class="text-dark font-weight-bolder">Use our search function to find the device you are looking to sell. You will receive the best possible deal with our price promise!</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-30 text-center">
                        <i class="far fa-envelope fa-4x text-muted"></i>
                        <h4 class="pt-3 color-theme pb-3">Send Your Device</h4>
                        <p class="text-dark font-weight-bolder">Once you book your sale, we will send you a pre-paid shipping box to send us your device. Postage is completely free for you.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-30 text-center">
                        <i class="fas fa-pound-sign fa-4x text-muted"></i>
                        <h4 class="pt-3 color-theme pb-3">Get Paid Instantly</h4>
                        <p class="text-dark font-weight-bolder">We will carry out appropriate checks when we receive your device and send your payment straight to your account on the same day.</p>
                    </div>
                </div>
            @else
                <div class="row pt-50 justify-content-center bg-gray">
                    <div class="col-lg-4 col-md-6 col-12 mb-30 text-center">
                        <i class="fas fa-tablet fa-4x color-theme"></i>
                        <h4 class="pt-3 color-theme">We Repair Any Device</h4>
                        <p class="text-dark font-weight-bolder">Use our search function to find the device you are looking to sell. You will receive the best possible deal with our price promise!</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-30 text-center">
                        <i class="fas fa-walking fa-4x color-theme"></i>
                        <h4 class="pt-3 color-theme">Walk-In Repairs</h4>
                        <p class="text-dark font-weight-bolder">Once you book your sale, we will send you a pre-paid shipping box to send us your device. Postage is completely free for you.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-30 text-center">
                        <i class="fas fa-tools fa-4x color-theme"></i>
                        <h4 class="pt-3 color-theme">Mail-In Repairs</h4>
                        <p class="text-dark font-weight-bolder">We will carry out appropriate checks when we receive your device and send your payment straight to your account on the same day.</p>
                    </div>
                </div>
                <div class="row ptb-30px justify-content-center">
                    <div class="brand-item col-md-3 mb-3 p-20" onclick="window.location.href=''"><img src="{{ asset("storage/repairs/iphone-repair.png") }}" alt="iPhone Repair"></div>
                    <div class="brand-item col-md-3 mb-3 p-20" onclick="window.location.href=''"><img src="{{ asset("storage/repairs/repair.png") }}" alt="Repair"></div>
                    <div class="brand-item col-md-3 mb-3 p-20" onclick="window.location.href=''"><img src="{{ asset("storage/repairs/macbook-repair.png") }}" alt="MacBook Repair"></div>
                    <div class="brand-item col-md-3 mb-3 p-20" onclick="window.location.href=''"><img src="{{ asset("storage/repairs/imac-repair.png") }}" alt="iMac"></div>

                    <div class="brand-item col-md-3 mb-3 p-20" onclick="window.location.href=''"><img src="{{ asset("storage/repairs/one-plusrepair.png") }}" alt="one-Plus Repair"></div>
                    <div class="brand-item col-md-3 mb-3 p-20" onclick="window.location.href=''"><img src="{{ asset("storage/repairs/huawei-repair.png") }}" alt="Huawei Repair"></div>
                    <div class="brand-item col-md-3 mb-3 p-20" onclick="window.location.href=''"><img src="{{ asset("storage/repairs/samsung-repair.png") }}" alt="Samsung Repair"></div>
                    <div class="brand-item col-md-3 mb-3 p-20" onclick="window.location.href=''"><img src="{{ asset("storage/repairs/something-else.png") }}" alt="Something Else Repair"></div>
                </div>
            @endif
        </div>
    </div>
    <!-- Recently Add area start -->
    @if($service->id==2 && $brand->items->count()!==0)
        <div class="recent-add-area mb-30px mt-60px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">{{ __("Recently Sold Items") }}</h2>
                        </div>
                    </div>
                </div>
                <div class="recent-slider slider-nav-style-1 multi-row-2">
                    <div class="recent-slider-wrapper swiper-wrapper">
                        @foreach($brand->items()->skip(4)->take(4)->inRandomOrder()->get() as $item)
                            <div class="recent-slider-item swiper-slide">
                                <article class="list-product mb-30px">
                                    <div class="img-block">
                                        <a href="{{ route("category.item", ['freshen-up', $item->slug]) }}" class="thumbnail">
                                            <img class="first-img" src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" />
                                        </a>
                                    </div>
                                    <div class="product-decs pt-5">
                                        <h2><a href="{{ route("category.item", ['freshen-up', $item->slug]) }}" class="product-link">{{ $item->name }}</a></h2>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Recently Add area end -->
@endsection

@section('hero-section')
    <!-- Slider Start -->
    <div class="slider-area slider-height-1">
        <div class="hero-slider swiper-container">
            <div class="swiper-wrapper">
                <!-- Single Slider  -->
                <div class="swiper-slide bg-img d-flex" style="background-image: url({{ asset("storage/banners/slider-3.jpg") }});">
                    <div class="container align-self-center">
                        <div class="slider-content-1 slider-animated-1 text-left pl-60px">
                            <span class="animated color-gray">HURRY UP!</span>
                            <h1 class="animated color-black">
                                Amazing Deals On <br />
                                <strong>Premium Smartphones</strong>
                            </h1>
                            <a href="{{ route("services.show", 'buy') }}" class="shop-btn animated">{{ __("SHOP") }}</a>
                        </div>
                    </div>
                </div>
                <!-- Single Slider  -->
                <div class="swiper-slide bg-img d-flex" style="background-image: url({{ asset("rozer/assets/images/slider-image/sample-2.jpg") }});">
                    <div class="container align-self-center">
                        <div class="slider-content-1 slider-animated-1 text-left pl-60px">
                            <span class="animated color-gray">Sell Your Device </span>
                            <h1 class="animated color-black">
                                Get <strong class="big">Paid</strong> Instantly
                            </h1>
                            <a href="{{ route('services.show', 'sell') }}" class="shop-btn animated">{{ __('Sell') }}</a>
                        </div>
                    </div>
                </div>
                <!-- Single Slider  -->
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
        </div>
    </div>
    <!-- Slider End -->
@endsection

@section('stylesheets')@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection

{{--<div class="col">--}}
{{--    <div class="hero-slider hero-slider-one">--}}
{{--        <div class="hero-item" style="padding:2.24rem!important;">--}}
{{--            <div class="row align-items-center justify-content-between">--}}
{{--                <div class="hero-content col">--}}
{{--                    <h2>HURRY UP!</h2>--}}
{{--                    <h1><span>iPhone X</span></h1>--}}
{{--                    <h1>IT’S <span class="big">29%</span> OFF</h1>--}}
{{--                    <a href="#">get it now</a>--}}
{{--                </div>--}}
{{--                <div class="hero-image col">--}}
{{--                    <img src="http://preview.freethemescloud.com/ee/ee-v1/assets/images/hero/hero-1.png" alt="Hero Image">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- Hero Item End -->--}}
{{--        <!-- Hero Item Start -->--}}
{{--        <div class="hero-item">--}}
{{--            <div class="row align-items-center justify-content-between">--}}
{{--                <!-- Hero Content -->--}}
{{--                <div class="hero-content col">--}}
{{--                    <h2>HURRY UP!</h2>--}}
{{--                    <h1><span>GL G6</span></h1>--}}
{{--                    <h1>IT’S <span class="big">35%</span> OFF</h1>--}}
{{--                    <a href="#">get it now</a>--}}
{{--                </div>--}}

{{--                <!-- Hero Image -->--}}
{{--                <div class="hero-image col">--}}
{{--                    --}}{{--                                    <img src="{{ asset("theme/assets/images/hero/hero-2.png") }}" alt="Hero Image">--}}
{{--                    <img src="http://preview.freethemescloud.com/ee/ee-v1/assets/images/hero/hero-2.png" alt="Hero Image">--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- Hero Item End -->--}}
{{--        <!-- Hero Item Start -->--}}
{{--        <div class="hero-item">--}}
{{--            <div class="row align-items-center justify-content-between">--}}
{{--                <!-- Hero Content -->--}}
{{--                <div class="hero-content col">--}}
{{--                    <h2>HURRY UP!</h2>--}}
{{--                    <h1><span>MSVII Case</span></h1>--}}
{{--                    <h1>IT’S <span class="big">15%</span> OFF</h1>--}}
{{--                    <a href="#">get it now</a>--}}

{{--                </div>--}}
{{--                <!-- Hero Image -->--}}
{{--                <div class="hero-image col">--}}
{{--                    --}}{{--                                    <img src="{{ asset("theme/assets/images/hero/hero-3.png") }}" alt="Hero Image">--}}
{{--                    <img src="http://preview.freethemescloud.com/ee/ee-v1/assets/images/hero/hero-3.png" alt="Hero Image">--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- Hero Item End -->--}}
{{--    </div><!-- Hero Slider End -->--}}

{{--</div>--}}
