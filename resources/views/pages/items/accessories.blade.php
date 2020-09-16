@extends('layouts.app')

@section('title', $title ?? 'Products')

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
    <div class="shop-category-area mt-30px">
        @if($items->count() > 0)
            <div class="container">
                <div class="row">
                    <div class="col mb-3">
                        <div class=""><h4>{{ $title ?? __('Accessories') }}</h4></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach($items as $item)
                        <div class="col-md-3 col-sm-6">
                            <article class="list-product">
                                <div class="img-block p-5">
                                    <a href="#" class="thumbnail">
                                        <img class="img-fluid" src="{{ asset("storage/accessories/{$item->image}") }}" alt="{{ $item->name }}"/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <h2><a href="#" class="product-link">{{ $item->name }}</a></h2>
                                    <div class="pricing-meta">
                                        <ul>
                                            @if($item->category_id==4)
                                                <li class="current-price">{{ config('app.default_currency' ?? '£') }}{{ $item->price ?? '' }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <li class="cart">
                                            <a href="#" data-id="{{ $item->slug }}" data-key="{{ $category->id }}" class="cart-btn @if(Session::has('cart') && array_key_exists($item->id, Session::get('cart')->items)) added @endif"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    <div class="pro-pagination-style text-center mb-60px mt-30px">
                        <ul>{{ $items->links() }}</ul>
                    </div>
                </div>
            </div>
        @else
            <div class="track-order-section section mt-90 mb-50">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="track-order-title text-center col-12 mb-80">
                            <h2>Sorry! No Items found</h2>
                            <p>Sorry! There are no items listed under {{ $category->name }}. If you didn't find any product of your choice you can write an email to us.</p>
                        </div>

                        <div class="col-lg-6 col-md-7 col-12 mb-40">
                            <div class="track-order-form">
                                <form action="#">
                                    <label for="order_id">Order ID</label>
                                    <input type="text" id="order_id" placeholder="Find it in your order confirmation email">
                                    <label for="billing_email">Billing Email Address</label>
                                    <input type="email" id="billing_email" placeholder="Email you used during checkout">

                                    <input type="submit" value="Track Order">
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-12 ml-auto mb-40">
                            <div class="banner"><a href="#"><img src="{{ asset("storage/banners/banner-1.png") }}" alt="Banner"></a></div>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('header')
    @parent
    <div class="header-category-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">

                    <!-- Header Category -->
                    <div class="header-category">

                        <!-- Category Toggle Wrap -->
                        <div class="category-toggle-wrap d-block d-lg-none">
                            <!-- Category Toggle -->
                            <button class="category-toggle">Categories <i class="ti-menu"></i></button>
                        </div>

                        <!-- Category Menu -->
                        <nav class="category-menu">
                            <ul>
                                {{--                                @foreach($types as $type)--}}
                                {{--                                    <li><a href="">{{ $type->name }}</a></li>--}}
                                {{--                                @endforeach--}}
                                {{--                                @foreach($categories as $category)--}}
                                {{--                                    <li><a href="">{{ $category->name }}</a></li>--}}
                                {{--                                @endforeach--}}
                            </ul>
                        </nav>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('stylesheets')@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection

