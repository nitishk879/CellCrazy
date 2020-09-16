@extends('layouts.app')

@section('title', $title ?? 'Products')

@section('content')

    <div class="product-section section mt-90 mb-90">
        <div class="container-fluid">
            <div class="row mb-90">
                <div class="col-lg-4 col-12 mb-15">
                    <div class="single-product-image">
                        <div class="tab-content">
                            <div id="single-image-1" class="tab-pane fade show active big-image-slider">
                                <div class="big-image"><img src="{{ asset("storage/products/{$item->image}") }}" alt="Big Image"><a href="{{ asset("storage/products/{$item->image}") }}" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 mb-15">
                    <div class="single-product-content">
                        <div class="head-content">
                            <div class="category-title">
                                <h5 class="title">{{ $item->name }}</h5>
                            </div>
                            <h5 class="price update-price p-2 text-primary border border-info">
                                {{ config('app.default_currency' ?? '£') }}{{ $item->price ?? '' }}
                            </h5>
                        </div>
                        <div class="single-product-description">
                            <div class="desc">
                                <p>{!! $item->short_desc !!}</p>
                            </div>
                            <div class="actions">
                                <a href="#" data-id="{{ $item->slug }}" data-key="{{ $category->id }}" class="add-to-cart @if(Session::has('cart') && array_key_exists($item->id, Session::get('cart')->items)) added @endif"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-section section mb-70">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-40">
                    <div class="section-title-one" data-title="RELATED PRODUCT"><h1>RELATED PRODUCT</h1></div>
                </div><!-- Section Title End -->
                <!-- Product Tab Content Start -->
                <div class="col-12">
                    <div class="product-slider-wrap product-slider-arrow-one">
                        <!-- Product Slider Start -->
                        <div class="product-slider product-slider-4">
                            @foreach($category->items()->where('item_id', '!=', $item->id)->get() as $item)
                                <div class="col pb-20 pt-10">
                                    <div class="ee-product">
                                        <div class="image">
                                            <a href="{{ route("category.item", [$category->slug, $item->slug]) }}" class="img">
                                                <img src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}">
                                            </a>
                                            <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                                        </div>
                                        <div class="content">
                                            <div class="category-title">
                                                <h5 class="title"><a href="{{ route("category.item", [$category->slug, $item->slug]) }}">{{ $item->name }}</a></h5>
                                            </div>
                                            <div class="price-ratting">
                                                <h5 class="price">{{ config('app.default_currency' ?? '£') }}{{ $item->models[0]->price['sales'] ?? $item->models[0]->price['regular'] }}</h5>
                                                <div class="ratting">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half"></i>
                                                </div>
                                            </div>

                                        </div>

                                    </div><!-- Product End -->
                                </div>
                            @endforeach

                        </div><!-- Product Slider End -->
                    </div><!-- Product Slider Wrap End -->

                </div><!-- Product Tab Content End -->

            </div>
        </div>
    </div>

@endsection

@section('header')
    @parent
@endsection

@section('stylesheets')@endsection

@section('scripts')
    <script>
        $("input[type=radio]").on('change', function (e){
            e.preventDefault();
            var m = Number($("input[name='memory']:checked").val());
            var s = $(this).data("key");
            var i = $(this).data("id");

            $.ajax({
                url: "/brand-new-price",
                data: { i:i, m: m, s:s },
                type: 'POST',headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (response) {
                    if(response){
                        $(".update-price").html("{{ config('app.default_currency', "$") }}"+response);
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
