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
                            <li><a href="/">Home</a></li>
                            <li>{{ $title ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End-->
    <!-- Shop details Area start -->
    <section class="product-details-area mtb-60px">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="product-details-img product-details-tab product-details-tab-2">
                        <div id="gallery" class="product-dec-slider-3 swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a class="active" data-image="{{ asset("storage/products/{$item->image}") }}" data-zoom-image="{{ asset("storage/products/{$item->image}") }}">
                                        <img class="img-responsive" src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" />
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-image="{{ asset("storage/products/{$item->image}") }}" data-zoom-image="{{ asset("storage/products/{$item->image}") }}">
                                        <img class="img-responsive" src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="zoompro-wrap zoompro-2">
                            <div class="zoompro-border zoompro-span">
                                <img class="zoompro" src="{{ asset("storage/products/{$item->image}") }}" data-zoom-image="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="product-details-content">
                        <h2>{{ $item->name }}</h2>
                        <p class="reference text-success">{{ $item->type->name ?? 'Repair' }}</p>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut update-price">
                                    {{ config('app.default_currency' ?? '£') }}
                                    {{ $item->models()->firstWhere('category_id', $category->id)->price->sales  ?? $item->models()->firstWhere('category_id', $category->id)->price->regular }}
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-list">
                            {!! $item->short_desc !!}
                        </div>
                        <div class="col-md-12">
                            <form class="row quantity-colors" id="repairItem">
                                <div class="col-md-4">
                                    <h5>Repair Type</h5>
                                </div>
                                <div class="col-md-8 col-lg-8 colors">
                                    @if($item->repairs->count() > 0)
                                        <select class="custom-select" data-id="{{ $item->id }}" data-key="{{ $category->id }}" name="repair">
                                            @foreach($item->repairs as $repair)
                                                <option @if($repair->id===$item->repair) selected @endif value="{{ $repair->id }}">{{ $repair->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="pro-details-quality mt-0px">
                            <div class="pro-details-cart btn-hover">
                                <a href="#" data-id="{{ $item->slug }}" data-key="{{ $category->id }}" class="add-to-cart @if(Session::has('cart') && array_key_exists($item->id, Session::get('cart')->items)) added @endif"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop details Area End -->
    <!-- Feature Area start -->
    <div class="feature-area single-product-responsive mt-60px mb-30px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="section-heading">You Might Also Like</h2>
                    </div>
                </div>
            </div>
            <div class="feature-slider-two slider-nav-style-1">
                <div class="feature-slider-wrapper swiper-wrapper">
                    @foreach($related_item as $item)
                        <div class="feature-slider-item swiper-slide">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="{{ route("category.item", [$category->slug, $item->slug]) }}" class="thumbnail">
                                        <img class="first-img" src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                            <i class="icon-magnifier icons"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs text-center">
                                    <h2><a href="{{ route("category.item", [$category->slug, $item->slug]) }}" class="product-link">{{ $item->name }}</a></h2>
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
    <!-- Feature Area End -->

@endsection

@section('header')
    @parent
@endsection

@section('stylesheets')
    <style type="text/css">
        div.nice-select{
            width: 182px!important;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $("select").on('change', function (e){
            e.preventDefault();
            var m = Number($("select[name='repair']").val());
            var s = $(this).data("key");
            var i = $(this).data("id");

            $.ajax({
                url: "/repair-price",
                data: { i:i, m: m, s:s },
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (response) {
                    if(response){
                        $(".update-price").html("{{ config('app.default_currency', "£") }}"+response);
                        if($('.add-to-cart').hasClass('d-none')){
                            $(".add-to-cart").removeClass('d-none');
                        }
                    }else{
                        $(".update-price").html("N/A");
                        $(".add-to-cart").addClass('d-none');
                    }
                }
            })
        });
    </script>
@endsection

@section('subscriber-section')@endsection
