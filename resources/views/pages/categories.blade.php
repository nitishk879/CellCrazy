@extends('layouts.app')

@section('title', $title ?? 'Categories')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="nav">
                            <li><a href="index.html">Home</a></li>
                            <li>Single Product</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End-->

    <div class="product-section section mt-90 mb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-50">
                        <div class="col">
                            <div class="shop-top-bar">
                                <div class="product-view-mode">
                                    <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                    <a href="#" data-target="list"><i class="fa fa-list"></i></a>
                                </div>
                                <div class="product-showing">
                                    <p>Showing</p>
                                    <select name="showing" class="nice-select">
                                        <option value="8" @if($items->items()==8) selected @endif>8</option>
                                        <option value="12" @if($items->items()==12) selected @endif>12</option>
                                        <option value="16" @if($items->items()==16) selected @endif>16</option>
                                        <option value="20" @if($items->items()==20) selected @endif>20</option>
                                        <option value="24" @if($items->items()==24) selected @endif>24</option>
                                    </select>
                                </div>
                                <!-- Product Short -->
                                <div class="product-short">
                                    <p>Short by</p>
                                    <select name="sortby" class="nice-select">
                                        <option value="trending">Trending items</option>
                                        <option value="sales">Best sellers</option>
                                        <option value="rating">Best rated</option>
                                        <option value="date">Newest items</option>
                                        <option value="price-asc">Price: low to high</option>
                                        <option value="price-desc">Price: high to low</option>
                                    </select>
                                </div>
                                <!-- Product Pages -->
                                <div class="product-pages">
                                    <p>Pages {{ $items->currentPage() }} of {{ $items->lastPage() }}</p>
                                </div>
                            </div>
                            <!-- Shop Top Bar End -->
                        </div>
                    </div>

                    <div class="shop-product-wrap grid row">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12 pb-30 pt-10">
                            @foreach($items as $item)
                                <div class="ee-product">
                                    <div class="image">
                                        <a href="{{ route("products.show", $item->slug) }}" class="img">
                                            <img src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}"></a>
                                        <div class="wishlist-compare">
                                            <a href="" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                            <a href="" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                        </div>
                                        <a href="" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                                    </div>
                                    <div class="content">
                                        <div class="category-title">
                                            <a href="#" class="cat">{{ $item->type }}</a>
                                            <h5 class="title"><a href="{{ route("products.show", $item->slug) }}">{{ $item->name }}</a></h5>
                                        </div>
                                        <div class="price-ratting">
                                            <h5 class="price">${{ $item->price['regular'] ?? '' }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{--     List view goes here      --}}
                            @foreach($items as $item)
                                <div class="ee-product-list">
                                    <div class="image">
                                        <a href="{{ route("products.show", $item->slug) }}" class="img">
                                            <img src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="head-content">
                                            <div class="category-title">
                                                <a href="#" class="cat">{{ $item->name }}</a>
                                                <h5 class="title"><a href="{{ route("products.show", $item->slug) }}">{{ $item->name }}</a></h5>
                                            </div>
                                            <h5 class="price">${{ $item->price['regular'] ?? '' }}</h5>
                                        </div>
                                        <div class="left-content">
                                            <div class="desc">
                                                <p>{!! $item->short_desc !!}</p>
                                            </div>
                                            <div class="actions">
                                                <a href="" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                                                <div class="wishlist-compare">
                                                    <a href="" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                                    <a href="" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="right-content">
                                            <div class="specification">
                                                <h5>Specifications</h5>
                                                <ul>                                                </ul>
                                            </div>
                                            <span class="availability">Availability: <span>In Stock</span></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row mt-30">
                        <div class="col">
                            <ul class="pagination">
                                <li class="@if($items->currentPage()==1) d-none @endif"><a href="{{ $items->previousPageUrl() }}"><i class="fa fa-angle-left"></i>Back</a></li>
                                @if($items->currentPage() > 2)
                                    <li><a href="{{ $items->url($items->currentPage()-2) }}">{{ $items->currentPage()-2 }}</a></li>
                                @endif
                                @if($items->currentPage() > 1)
                                    <li><a href="{{ $items->url($items->currentPage()-1) }}">{{ $items->currentPage()-1 }}</a></li>
                                @endif
                                <li class="@if($items->currentPage()) active @endif"><a href="#">{{ $items->currentPage() }}</a></li>
                                @if(($items->lastPage() - $items->currentPage()) >= 1)
                                    <li><a href="{{ $items->url($items->currentPage()+1) }}">{{ $items->currentPage()+1 }}</a></li>
                                @endif
                                @if(($items->lastPage() - $items->currentPage()) >= 2)
                                    <li><a href="{{ $items->url($items->currentPage()+2) }}">{{ $items->currentPage()+2 }}</a></li>
                                @endif
                                <li class="@if($items->currentPage()==$items->lastPage()) d-none @endif"><a href="{{ $items->nextPageUrl() }}">Next<i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
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
