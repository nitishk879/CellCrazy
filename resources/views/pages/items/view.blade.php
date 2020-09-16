@extends('layouts.app')

@section('title', $title ?? 'Products')
@php $sell = $item->models()->firstWhere('category_id', $category->id); @endphp
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
                    <div class="product-details-img product-details-tab product-details-tab-2 flex-row-reverse">
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
                            @if($item->networks->count()>=1)
                                <ul>
                                    <li class="old-price not-cut update-price">
                                        {{ config('app.default_currency' ?? '£') }}
                                        {{ $item->models()->firstWhere('category_id', $category->id)->price->sales  ?? $item->models()->firstWhere('category_id', $category->id)->price->regular }}
                                    </li>
                                </ul>
                            @endif
                        </div>
                        <p class="reference">Reference:<span> <a href="{{ route('category.type', [$category->slug, $item->type->slug]) }}" class="cat">{{ $item->type->name }}</a></span></p>
                        <div class="pro-details-list" id="freshenUp">
                            <div class="quantity-colors">
                                @if($item->memories->count() > 0)
                                    <div class="row justify-content-between">
                                        <h5 class="col-md-4 col-lg-3 align-self-center">Memory</h5>
                                        <div class="col-md-9 col-lg-9 media-body">
                                            <div class="radio-toolbar">
                                                @foreach($item->memories as $memory)
                                                    <input type="radio" id="radio{{ $memory->slug }}" @if($item->models[0]->memory)
                                                           @if($memory->id==$item->models[0]->memory->id) checked @endif @endif
                                                    name="memory" data-id="{{ $item->id }}" data-key="{{ $category->id }}" value="{{ $memory->id }}">
                                                    <label for="radio{{ $memory->slug }}">{{ $memory->name }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($category->conditions->count() > 0)
                                    <div class="row justify-content-between">
                                        <h5 class="col-md-4 col-lg-3 align-self-center">Condition</h5>
                                        <div class="col-md-9 col-lg-9 media-body">
                                            <div class="radio-toolbar">
                                                @foreach($category->conditions as $condition)
                                                    @isset($sell->condition)
                                                        <input type="radio" id="radio{{ $condition->slug }}" @if($condition->id==$sell->condition->id) checked @endif name="condition" data-id="{{ $item->id }}" data-key="{{ $category->id }}" value="{{ $condition->id }}">
                                                    @else
                                                        <input type="radio" class="disabled" id="radio{{ $condition->slug }}" value="{{ $condition->id }}" disabled>
                                                    @endisset
                                                    <label for="radio{{ $condition->slug }}">{{ $condition->name }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($item->networks->count() > 0)
                                    <div class="row justify-content-between">
                                        <h5 class="col-md-4 col-lg-3 align-self-center">Network</h5>
                                        <div class="col-md-9 col-lg-9 media-body">
                                            <div class="radio-toolbar text-center">
                                                @foreach($item->networks as $network)
                                                    <input type="radio" id="radio{{ $network->slug }}" @if($network->id==$sell->network->id) checked @endif name="network" data-id="{{ $item->id }}" data-key="{{ $category->id }}" value="{{ $network->id }}">
                                                    <label class="network" for="radio{{ $network->slug }}" title="{{ $network->name }}">
                                                        <img src="{{ asset("storage/networks/{$network->image}") }}" width="42px" height="42" alt="{{ $network->name }}" class="" />
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="pro-details-quality mt-0px">
                            <div class="pro-details-cart btn-hover">
                                <a href="#" data-id="{{ $item->slug }}" data-key="{{ $category->id }}" role="button" class="cart-btn-2 @if(Session::has('wishlist') && array_key_exists($item->id, Session::get('wishlist')->items)) added @endif"><i class="fas fa-shopping-cart"></i> <span>Sell Now</span></a>
                            </div>
                            <!-- TrustBox widget - Micro TrustScore -->
                            <div class="trustpilot-widget pt-3" data-locale="en-GB" data-template-id="5419b637fa0340045cd0c936" data-businessunit-id="4e91a7080000640005112fee" data-style-height="20px" data-style-width="100%" data-theme="light">
                                <a href="https://uk.trustpilot.com/review/cellcrazy.co.uk" target="_blank" rel="noopener">Trustpilot</a>
                            </div>
                            <!-- End TrustBox widget -->
                        </div>
                        <div class="pro-details-policy">
                            <div class="features tags">
                                <span class="badge badge-theme mb-3"><i class="fas fa-phone-square"></i> Faulty phones accepted</span>
                                <span class="badge badge-theme mb-3"><i class="fas fa-credit-card"></i> Same-day payments</span>
                                <span class="badge badge-theme mb-3"><i class="fas fa-envelope"></i> Free to send your device</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ptb-10px">
                <div class="col-md-12 text-center">
                    <div class="content">
                        @if($item->brand->slug=='apple')
                            <p><span class="text-danger">Please remove your iCloud account before selling to us!</span> <a class="btn btn-sm btn-outline-theme" href="">Learn how →</a> </p>
                        @elseif($item->brand->slug=='samsung')
                            <p><span class="text-danger">Please remove your Find My Phone account before selling to us!</span> <a class="btn btn-sm btn-outline-theme" href="">Learn how →</a> </p>
                        @else
                            <p>Please remove any locks on your phone before selling to us. Your payment may be delayed if your phone is locked on arrival.</p>
                        @endif
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
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane active">
                        <div class="product-anotherinfo-wrapper">
                            <div class="row">
                                @foreach($category->conditions as $condition)
                                    <div class="col-md-6 col-12 mb-10">
                                        <h4 class="color-theme pb-3">{{ $condition->name }}</h4>
                                        <p>{!! $condition->desc !!}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 my-3 text-center">
                    <div class="title" data-title="How to Sell"><h1>How do I sell my phone?</h1></div>
                </div>
                <div class="col-md-12">
                    <div class="row text-center">
                        <div class="col-lg-4 col-md-6 col-12 mb-30 bg-gray p-3">
                            <i class="fas fa-handshake fa-4x color-theme"></i>
                            <h3 class="color-theme">Confirm Sale</h3>
                            <p class="text-justify pt-1">Complete your sale today to lock in your price. We guarantee to pay this price or we’ll send your device straight back to you – for free.</p>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12 mb-30 bg-gray p-3">
                            <i class="fas fa-truck fa-4x color-theme"></i>
                            <h3 class="color-theme">Send Your Device</h3>
                            <p class="text-justify pt-1">We’ll send you a fully insured & pre-paid shipping box to send your device to us. Trackable via Royal Mail’s 24 Hour service.</p>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12 mb-30 bg-gray p-3">
                            <i class="fas fa-credit-card fa-4x color-theme"></i>
                            <h3 class="color-theme">Receive Your Payment</h3>
                            <p class="text-justify pt-1">We’ll send you your payment on the same day we receive your device – just choose how you would like to be paid at checkout.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details description area end -->
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
                var m = @if($item->memories->count() > 0) Number($("input[name='memory']:checked").val()) @else '' @endif;
                var n = Number($("input[name='network']:checked").val());
                var c = Number($("input[name='condition']:checked").val());
                var s = $(this).data("key");
                var i = $(this).data("id");

                $.ajax({
                    url: '/sales-price',
                    data: { i:i, m: m, n:n, c:c, s:s },
                    type: 'POST',
                    headers: {
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
