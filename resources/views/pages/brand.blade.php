@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <!-- Page Banner Section Start -->
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center ">
            <!-- Page Banner -->
            <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>{{ $brand->name }}</h1>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">HOME</a></li>
                            <li><a href="#">{{ $title ?? 'Brand' }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Banner -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-1">
                <div class="banner"><a href="#"><img src="{{ asset("storage/banners/banner-left.jpg") }}" alt="Banner"></a></div>
            </div>

            <!-- Banner -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-3">
                <div class="banner"><a href="#"><img src="{{ asset("storage/banners/banner-right.jpg") }}" alt="Banner"></a></div>
            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->

    <!-- Banner Section Start -->
    <div class="banner-section section mt-90">
        @foreach($types as $type)
            <div class="container">
                <div class="row mb-50">
                    <div class="col-12 mb-40">
                        <h4><a href="{{ route('brand.type', [$brand->slug, $type->slug]) }}">{{ $type->name ?? __('Brand') }}</a></h4>
                    </div>
                    @foreach(\App\Item::where('brand_id', $brand->id)->where('type_id', $type->id)->get() as $item)
                        <div class="col-md-4 col-12 mb-30">
                            <div class="banner">
                                <a href=""><img src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <!-- Banner Section End -->
@endsection

@section('stylesheets')@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
