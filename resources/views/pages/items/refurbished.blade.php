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
                        <div class="pricing-meta d-flex justify-content-between">
                            <h2>{{ $item->name }}</h2>
                            <ul>
                                <li class="old-price not-cut update-price">
                                    {{ config('app.default_currency' ?? '£') }}{{ $item->models()->firstWhere('category_id', $category->id)->price->sales  ?? $item->models()->firstWhere('category_id', $category->id)->price->regular }}
                                </li>
                            </ul>
                        </div>
                        <p class="reference color-theme">UNLOCKED • FULLY TESTED • 12 MONTH WARRANTY</p>
                        <div class="pro-details-list">
                            {!! $item->short_desc !!}
                        </div>
                        <div class="col-md-12">
                            @if($item->type->id==2)
                                <div class="col-md-12">
                                    <h5>Function</h5>
                                </div>
                            @else
                                @if($item->memories->count() > 0)
                                    <div class="row justify-content-between">
                                        <h5 class="col-md-4 col-lg-3 align-self-center mr-3">Memory</h5>
                                        <div class="col-md-9 col-lg-9 media-body">
                                            <div class="radio-toolbar">
                                                @foreach($item->memories as $memory)
                                                    <input type="radio" id="radio{{ $memory->slug }}" @if($memory->id==$item->models[0]->memory->id) checked @endif name="memory" data-id="{{ $item->id }}" data-key="{{ $category->id }}" value="{{ $memory->id }}">
                                                    <label for="radio{{ $memory->slug }}">{{ $memory->name }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @if($category->conditions->count() > 0)
                                <div class="row justify-content-between">
                                    <h5 class="col-md-4 col-lg-3 align-self-center mr-3">Condition</h5>
                                    <div class="col-md-9 col-lg-9 media-body">
                                        <div class="radio-toolbar">
                                            @foreach($category->conditions as $condition)
                                                <input type="radio" id="radio{{ $condition->slug }}" @if($condition->id==$item->models[0]->condition->id) checked @endif name="condition" data-id="{{ $item->id }}" data-key="{{ $category->id }}" value="{{ $condition->id }}">
                                                <label for="radio{{ $condition->slug }}">{{ $condition->name }}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($item->colors->count() > 0)
                                <div class="row justify-content-between">
                                    <h5 class="col-md-4 col-lg-3 align-self-center mr-3">Color</h5>
                                    <div class="col-md-9 col-lg-9 media-body">
                                        @foreach($item->colors as $color)
                                            <div class="color-radios form-check form-check-inline">
                                                <input type="radio" id="{{ $color->slug }}" title="{{ $color->name }}" name="color" value="{{ $color->slug }}" checked>
                                                <label for="{{ $color->slug }}">
                                                    <span><i class="fas fa-check text-primary"></i></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="pro-details-quality mt-0px">
                            <div class="pro-details-cart btn-hover">
                                <a href="#" data-id="{{ $item->slug }}" data-key="{{ $category->id }}" class="add-to-cart @if(Session::has('cart') && array_key_exists($item->id, Session::get('cart')->items)) added @endif"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                            </div>
                            <!-- TrustBox widget - Micro TrustScore -->
                            <div class="trustpilot-widget pt-3" data-locale="en-GB" data-template-id="5419b637fa0340045cd0c936" data-businessunit-id="4e91a7080000640005112fee" data-style-height="20px" data-style-width="100%" data-theme="light">
                                <a href="https://uk.trustpilot.com/review/cellcrazy.co.uk" target="_blank" rel="noopener">Trustpilot</a>
                            </div>
                            <!-- End TrustBox widget -->
                        </div>
                        <div class="pro-details-policy">
                            <div class="features mb-2">
                                <span class="badge badge-theme"><i class="fa fa-truck text-white-50"></i> Free Delivery</span>
                                <span class="badge badge-theme"><i class="fa fa-unlock text-white-50"></i> Unlocked</span>
                                <span class="badge badge-theme"><i class="fa fa-certificate text-white-50"></i> Certified Device</span>
                                <span class="badge badge-theme"><i class="fa fa-calendar text-white-50"></i> 14 days return</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 p-3">
                    <div class="media bg-light">
                        <i class="fas fa-check-circle fa-2x color-theme align-self-center mr-3"></i>
                        <div class="media-body">
                            <h5 class="font-weight-bold color-theme">12 Months Warranty! </h5>
                            <p> We have got you covered!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-3">
                    <div class="media bg-light">
                        <i class="fas fa-box-open fa-2x color-theme align-self-center mr-3"></i>
                        <div class="media-body">
                            <p class="p-2">
                                Your device will come boxed with its original charger & a SIM opening tool.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop details Area End -->
    <!-- product details description area start -->
    <div class="description-review-area mb-60px">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a class="active" data-toggle="tab" href="#des-details2">Grading System</a>
                    <a data-toggle="tab" href="#des-details1">Description</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane active">
                        <div class="product-anotherinfo-wrapper">
                            <div class="row">
                                @foreach($category->conditions as $condition)
                                    <div class="col-lg-4 col-md-6 col-12 mb-10 mb-3">
                                        <h4 class="color-theme">{{ $condition->name }}</h4>
                                        <p>{!! $condition->desc !!}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane">
                        <div class="product-description-wrapper">
                            {!! $item->long_desc ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details description area end -->
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
                                <a class="inner-link" href="{{ route("category.type", [$category->slug, $item->type->slug]) }}"><span>{{ $item->type->name }}</span></a>
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

@section('stylesheets')@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("input[type=radio]").on('change', function (e){
                e.preventDefault();
                var m = Number($("input[name='memory']:checked").val());
                var c = Number($("input[name='condition']:checked").val());
                var s = $(this).data("key");
                var i = $(this).data("id");

                $.ajax({
                    url: "/furbished-price",
                    data: { i:i, m: m, c:c, s:s },
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
        });
    </script>
@endsection

@section('subscriber-section')@endsection
