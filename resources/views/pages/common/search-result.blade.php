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
    @if($items->count() >=1)
        <!-- Shop Category Area End -->
        <div class="shop-category-area mt-30px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <!-- Shop Top Area Start -->
                        <div class="shop-top-bar d-flex">
                            <!-- Left Side start -->
                            <div class="shop-tab nav d-flex">
                                <p>There Are {{ $items->count() ?? '' }} Product(s).</p>
                            </div>
                            <!-- Left Side End -->
                            <!-- Right Side Start -->
                            <div class="select-shoing-wrap d-flex"></div>
                            <!-- Right Side End -->
                        </div>
                        <!-- Shop Top Area End -->

                        <!-- Shop Bottom Area Start -->
                        <div class="shop-bottom-area mt-35">
                            <!-- Shop Tab Content Start -->
                            @foreach($items as $item)
                                <div class="shop-list-wrap mb-30px scroll-zoom">
                                    <div class="row list-product m-0px">
                                        <div class="col-md-12 padding-0px">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                                    <div class="left-img">
                                                        <div class="img-block">
                                                            <a href="#" class="thumbnail">
                                                                <img class="first-img" src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" />
                                                            </a>
                                                            <div class="quick-view">
                                                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="ion-ios-search-strong"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <ul class="product-flag">
                                                            <li class="new">{{ $item->brand->name }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                                                    <div class="product-desc-wrap">
                                                        <div class="product-decs">
                                                            <a class="inner-link" href="{{ route("types.show", $item->type->slug) }}"><span>{{ $item->type->name ?? '' }}</span></a>
                                                            <h2><a href="#" class="product-link">{{ $item->name }}</a></h2>
                                                            <div class="product-intro-info">
                                                                {!! $item->long_desc ?? '' !!}
                                                            </div>
                                                            <div class="btn-group">
                                                                @foreach($item->categories as $category)
                                                                    <a class="btn btn-outline-theme" href="{{ route('category.type', [$category->slug, $item->type->slug]) }}"><span>{{ $category->service->name }}</span></a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Shop Tab Content End -->
                            <!--  Pagination Area Start -->
                            <div class="pro-pagination-style text-center mb-60px mt-30px">
                                {{ $items->appends(request()->input('search'))->links() }}
                            </div>
                            <!--  Pagination Area End -->
                        </div>
                        <!-- Shop Bottom Area End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Category Area End -->
    @else
        <div class="banner-area mb-30px mt-30px">
            <div class="container">
                <div class="row align-items-center">
                    <div class="track-order-title text-center col-12 my-5">
                        <h2 class="mb-3">Sorry! No items found for this page.</h2>
                        <p>If you're looking for some products which are not here! Please contact to service provider at <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.name') }}</a> </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('header')
    @parent
@endsection

@section('stylesheets')@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
