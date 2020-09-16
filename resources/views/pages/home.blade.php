@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <!-- Static Area Start -->
    <div class="static-area mtb-60px">
        <div class="container">
            <div class="static-area-wrap">
                <div class="row">
                    <!-- Static Single Item Start -->
                    <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-md-30px mb-lm-30px">
                        <div class="single-static justify-content-center">
                            <img src="{{ asset("images/icons/static-icons-1.png") }}" alt="" class="img-responsive" />
                            <div class="single-static-meta">
                                <h4>Free Shipping</h4>
                                <p>On all orders</p>
                            </div>
                        </div>
                    </div>
                    <!-- Static Single Item End -->
                    <!-- Static Single Item Start -->
                    <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-md-30px mb-lm-30px">
                        <div class="single-static justify-content-center">
                            <img src="{{ asset("images/icons/static-icons-2.png") }}" alt="" class="img-responsive" />
                            <div class="single-static-meta">
                                <h4>Quick & Easy</h4>
                                <p>Checkout process</p>
                            </div>
                        </div>
                    </div>
                    <!-- Static Single Item End -->
                    <!-- Static Single Item Start -->
                    <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-sm-30px">
                        <div class="single-static justify-content-center">
                            <img src="{{ asset("images/icons/static-icons-4.png") }}" alt="" class="img-responsive" />
                            <div class="single-static-meta">
                                <h4>Over 10000</h4>
                                <p>Happy Customers</p>
                            </div>
                        </div>
                    </div>
                    <!-- Static Single Item End -->
                    <!-- Static Single Item Start -->
                    <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                        <div class="single-static justify-content-center">
                            <img src="{{ asset("images/icons/static-icons-3.png") }}" alt="" class="img-responsive" />
                            <div class="single-static-meta">
                                <h4>24/7 SUPPORT</h4>
                                <p>Around the clock</p>
                            </div>
                        </div>
                    </div>
                    <!-- Static Single Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Static Area End -->

    <!-- Recently Add area start -->
    <div class="recent-add-area mb-60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="section-heading">{{ __("Best Deals") }}</h2>
                    </div>
                </div>
            </div>
            <div class="recent-slider slider-nav-style-1">
                <div class="recent-slider-wrapper swiper-wrapper">
                    @foreach($items as $item)
                        <div class="recent-slider-item swiper-slide">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="{{ route('category.item', ['refurbished', $item->slug]) }}" class="thumbnail">
                                        <img class="first-img" src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name ?? '' }}" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#{{ $item->slug }}Model">
                                            <i class="icon-magnifier icons"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link" href=""><span>{{ $item->type->name ?? '' }}</span></a>
                                    <h2><a href="{{ route('category.item', ['refurbished', $item->slug]) }}" class="product-link">{{ $item->name ?? '' }}</a></h2>
                                    <div class="pricing-meta">
                                        <ul>
                                            @if($item->models[0]->price->sales ?? '')
                                                <li class="old-price">{{ config('app.default_currency' ?? '£') }}{{ $item->models[0]->price['regular'] ?? '' }}</li>
                                            @endif
                                            @if($item->models[0]->price->regular ?? '')
                                                <li class="old-price not-cut">{{ config('app.default_currency' ?? '£') }}{{ $item->models[0]->price['sales'] ?? $item->models[0]->price['regular'] ??  '' }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li class="cart">
                                                <a href="#" class="add-to-cart" data-id="{{ $item->slug }}" data-key="{{ $item->models[0]->category->id ?? '' }}"><i class="icon-bag"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
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
    <!-- Recently Add area end -->

    <!-- Testimonial Section Start -->
    <div class="testimonial-section section mt-20">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-12 mb-40">
                    <div class="section-title-one pb-3" data-title="REVIEWS">
                        <h1>
                            <a href="https://uk.trustpilot.com/review/cellcrazy.co.uk" target="_blank">{{ __('Trust Pilot') }}</a>
                            <img src="{{ asset("storage/partners/TrustPilot.png") }}" width="180px" alt="trustpilot">
                        </h1>
                    </div>
                </div><!-- Section Title End -->
                <div class="col-12 mb-3">
                    <!-- TrustBox widget - Carousel -->
                    <div class="trustpilot-widget" data-locale="en-GB" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="4e91a7080000640005112fee" data-style-height="130px" data-style-width="100%" data-theme="light" data-stars="1,2,3,4,5" data-review-languages="en">
                        <a href="https://uk.trustpilot.com/review/cellcrazy.co.uk" target="_blank" rel="noopener">Trustpilot</a>
                    </div>
                    <!-- End TrustBox widget -->
                </div>
            </div>

        </div>
    </div>
    <!-- Testimonial Section End -->

    @foreach($items as $item)
        <!-- Modal -->
        <div class="modal fade" id="{{ $item->slug }}Model" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 col-xs-12 mb-lm-100px mb-sm-30px">
                                <!-- Swiper -->
                                <div class="swiper-container gallery-top">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img class="img-responsive m-auto" src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-container gallery-thumbs">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img class="img-responsive m-auto" src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="product-details-content quickview-content">
                                    <h2>{{ $item->name ?? '' }}</h2>
                                    <p class="reference">Reference:<span> demo_17</span></p>
                                    <p class="quickview-para">{!! $item->desc ?? '' !!}</p>
                                    <div class="pro-details-quality">
                                        <div class="pro-details-cart btn-hover">
                                            <a class="add-to-cart" href="#"> + Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    @endforeach
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
                            <span class="animated color-theme">HURRY UP!</span>
                            <h1 class="animated color-theme-alt">
                                Deals On <br />
                                <strong>Premium <br />Phones</strong>
                            </h1>
                            <a href="{{ route("services.show", 'buy') }}" class="shop-btn animated">{{ __("SHOP") }}</a>
                        </div>
                    </div>
                </div>
                <!-- Single Slider  -->
                <div class="swiper-slide bg-img d-flex" style="background-image: url({{ asset("storage/banners/slider-4.jpg") }});">
                    <div class="container align-self-center">
                        <div class="slider-content-1 slider-animated-1 text-left pl-60px">
                            <span class="animated color-theme">Sell Your Device </span>
                            <h1 class="animated color-theme-alt">
                                Get <strong class="big">Paid</strong><br/> <strong>Instantly</strong>
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
