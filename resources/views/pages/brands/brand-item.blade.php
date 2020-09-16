@extends('layouts.app')

@section('title', $title ?? 'Products')

@section('content')
    @if($items->count() >=1)
        <div class="product-section section mt-90 mb-90">
            <div class="container">
                @foreach($categories as $category)
                    <div class="row">
                        <div class="col-12 mt-20 mb-20 text-center">
                            <h3><a href="{{ route("categories.show", $category->slug) }}">{{ $category->name ?? '' }}</a> </h3>
                        </div>
                        <div class="col-12">
                            <div class="shop-product-wrap grid row justify-content-center">
                                @foreach($items as $item)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 pb-30 pt-10">
                                        <div class="ee-product">
                                            <div class="image">
                                                <a href="{{ route('category.item', [$category->slug, $item->slug]) }}" class="img">
                                                    <img src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" class="img-fluid">
                                                </a>
                                                <a href="#" data-id="{{ $item->slug }}" data-key="{{ $item->models[0]->category->id }}" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                                            </div>
                                            <div class="content">
                                                <div class="category-title">
                                                    @if($item->models[0]->price->sales ?? '')
                                                        <a href="#" class="badge badge-warning p-1">{{ number_format(($item->models[0]->price->regular - $item->models[0]->price->sales)/$item->models[0]->price->regular*100, 2) }}%</a>
                                                    @endif
                                                    <h5 class="title"><a href="{{ route('category.item', [$category->slug, $item->slug]) }}">{{ $item->name }}</a></h5>
                                                </div>
                                                <div class="price-ratting">
                                                    <h5 class="price">{{ config('app.default_currency' ?? '£') }}{{ $item->models[0]->price['sales'] ?? $item->models[0]->price['regular'] }}</h5>
                                                    <div class="ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ee-product-list">
                                            <div class="image">
                                                <a href="" class="img">
                                                    <img src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <div class="head-content">
                                                    <div class="category-title">
                                                        <a href="#" class="cat">{{ $item->name }}</a>
                                                        <h5 class="title"><a href="{{ route('category.item', [$category->slug, $item->slug]) }}">{{ $item->name }}</a></h5>
                                                    </div>
                                                    <h5 class="price">{{ config('app.default_currency' ?? '£') }}{{ $item->models[0]->price['sales'] ?? $item->models[0]->price['regular'] }}</h5>
                                                </div>
                                                <div class="left-content">
                                                    <div class="ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="desc">
                                                        <p>{!! $item->short_desc !!}</p>
                                                    </div>
                                                    <div class="actions">
                                                        <a href="#" data-id="{{ $item->slug }}" data-key="{{ $item->models[0]->category->id }}" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                                                    </div>
                                                </div>

                                                <div class="right-content">
                                                    <div class="specification">
                                                        <h5>Specifications</h5>
                                                    </div>
                                                    <span class="availability">Availability: <span>In Stock</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="track-order-section section mt-90 mb-50">
            <div class="container">
                <div class="row align-items-center">
                    <div class="track-order-title text-center col-12 mb-80">
                        <h2>Sorry! No items found for this page.</h2>
                        <p>If you're looking for some products which are not here! Please contact to service provider at <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.name') }}</a> </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
