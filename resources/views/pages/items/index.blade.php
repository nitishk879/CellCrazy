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
                <div class="row justify-content-center">
                    @foreach($items as $item)
                        <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="{{ route('category.item', [$category->slug, $item->slug]) }}" class="thumbnail">
                                        <img class="first-img" src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="{{ route('category.type', [$category->slug, $item->type->slug]) }}"><span>{{ $item->type->name }}</span></a>
                                    <h2><a href="{{ route('category.item', [$category->slug, $item->slug]) }}" class="product-link font-weight-bold">{{ $item->name }}</a></h2>
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
        </div>
        <!-- Shop Category Area End -->
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
@endsection

@section('stylesheets')@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
