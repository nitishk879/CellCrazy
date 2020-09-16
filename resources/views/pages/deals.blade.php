@extends('layouts.app')

@section('title', $title ?? 'Best deals for you')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="nav">
                            <li><a href="{{ route("/") }}">Home</a></li>
                            <li>{{ $title ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End-->
    @foreach($types as $type)
        <!-- Feature Area start -->
        <div class="feature-area single-product-responsive mt-60px mb-30px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">{{ $type->name }} {{ __('Deal for you') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="feature-slider-two slider-nav-style-1">
                    <div class="feature-slider-wrapper swiper-wrapper">
                        <!-- Single Item -->
                        @foreach($type->items as $item)
                            <div class="feature-slider-item swiper-slide">
                                <article class="list-product">
                                    <div class="img-block">
                                        <a href="{{ route("category.item", ['refurbished', $item->slug]) }}" class="thumbnail">
                                            <img class="first-img" src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" />
                                        </a>
                                        <div class="quick-view">
                                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                <i class="icon-magnifier icons"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-decs text-center">
                                        <a class="inner-link" href=""><span>{{ $item->type->name ?? '' }}</span></a>
                                        <h2><a href="{{ route("category.item", ['refurbished', $item->slug]) }}" class="product-link">{{ $item->name }}</a></h2>
                                        <div class="pricing-meta">
                                            <ul>
                                                @if($item->models[0]->price->sales ?? '')
                                                    <li class="old-price">{{ config('app.default_currency' ?? '£') }}{{ $item->models[0]->price['regular'] ?? '' }}</li>
                                                @endif
                                                @if($item->models[0]->price->regular ?? '')
                                                    <li class="current-price">{{ config('app.default_currency' ?? '£') }}{{ $item->models[0]->price['sales'] ?? $item->models[0]->price['regular'] ??  '' }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li class="cart">
                                                <a title="Add to cart" href="#" data-id="{{ $item->slug }}" data-key="{{ $item->models[0]->category->id ?? '' }}"><i class="icon-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                    @endforeach
                    <!-- Single Item -->
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Area End -->
        @if($loop->iteration >= 1) @break @endif
    @endforeach
    <!-- Feature Section End -->
    <!-- Banner Area Start -->
    <div class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- TrustBox widget - Slider -->
                    <div class="trustpilot-widget" data-locale="en-GB" data-template-id="54ad5defc6454f065c28af8b" data-businessunit-id="4e91a7080000640005112fee" data-style-height="240px" data-style-width="100%" data-theme="light" data-stars="1,2,3,4,5" data-review-languages="en">
                        <a href="https://uk.trustpilot.com/review/cellcrazy.co.uk" target="_blank" rel="noopener">Trustpilot</a>
                    </div>
                    <!-- End TrustBox widget -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="banner-wrapper">
                        <a href="{{ route("services.show", 'buy') }}"><img src="{{ asset("storage/banners/banner-1.png") }}" alt="Buy" /></a>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="banner-wrapper">
                        <a href="{{ route("services.show", 'sell') }}"><img src="{{ asset("storage/banners/banner-2.png") }}" alt="Sell" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->
@endsection

@section('hero-section')@endsection
@section('stylesheets')@endsection

@section('scripts')
@endsection

@section('subscriber-section')@endsection
