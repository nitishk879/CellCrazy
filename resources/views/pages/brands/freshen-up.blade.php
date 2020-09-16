@extends('layouts.app')

@section('title', $title ?? 'Products')

@section('content')
    <div class="product-section section mt-90 mb-90">
        <div class="container-fluid">
            <div class="row mb-90">
                <div class="col-lg-6 col-12 mb-20">
                    <div class="single-product-image">
                        <div class="tab-content">
                            <div id="single-image-1" class="tab-pane fade show active big-image-slider">
                                <div class="big-image"><img src="{{ asset("storage/products/{$item->image}") }}" alt="Big Image"><a href="{{ asset("storage/products/{$item->image}") }}" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12 mb-20">
                    <div class="single-product-content">
                        <div class="head-content">
                            <div class="category-title">
                                <a href="{{ route('category.type', [$category->slug, $item->type->slug]) }}" class="cat">{{ $item->type->name }}</a>
                                <h5 class="title">{{ $item->name }}</h5>
                            </div>
                            <h5 class="price update-price">
                                {{ config('app.default_currency' ?? '£') }}
                                {{ $item->models()->firstWhere('category_id', $category->id)->price->sales  ?? $item->models()->firstWhere('category_id', $category->id)->price->regular }}
                            </h5>
                        </div>
                        <div class="single-product-description">
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="desc">
                                <p>{!! $item->short_desc !!}</p>
                            </div>
                            <form class="quantity-colors">
                                @if($item->memories->count() > 0)
                                    <div class="colors">
                                        <h5>Memory</h5>
                                        <select class="nice-select" data-id="{{ $item->id }}" data-key="{{ $category->id }}" name="memory">
                                            @foreach($item->memories as $memory)
                                                <option @if($memory->id===$item->memory['id']) selected @endif value="{{ $memory->id }}">{{ $memory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="colors">
                                    <h5>Network</h5>
                                    <select class="nice-select" data-id="{{ $item->id }}" data-key="{{ $category->id }}" name="network">
                                        @foreach($item->networks as $network)
                                            <option @if($network->id===$item->network['id']) selected @endif value="{{ $network->id }}">{{ $network->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if($category->conditions->count() > 0)
                                    <div class="colors">
                                        <h5>Condition</h5>
                                        <select class="nice-select" data-id="{{ $item->id }}" data-key="{{ $category->id }}" name="condition">
                                            @foreach($category->conditions as $condition)
                                                <option @if($condition->id==$item->condition['id']) selected @endif value="{{ $condition->id }}">{{ $condition->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </form>
                            <div class="actions">
                                <a href="#" data-id="{{ $item->slug }}" data-key="{{ $category->id }}" class="add-to-cart @if(Session::has('cart') && array_key_exists($item->id, Session::get('cart')->items)) added @endif"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                            </div>
                            <div class="tags">
                                <a href="#"><i class="fas fa-phone-square"></i> Faulty phones accepted</a>
                                <a href="#"><i class="fas fa-credit-card"></i> Same-day payments</a>
                                <a href="#"><i class="fas fa-envelope"></i> Free to send your device</a>
                            </div>
                            <div class="content">
                                @if($item->brand->slug=='apple')
                                    <div class="col-md-12 p-3 bg-gray">
                                        <p><span class="text-danger">Please remove your iCloud account before selling to us!</span> <a class="btn btn-sm btn-outline-warning" href="">Learn how →</a> </p>
                                    </div>
                                @elseif($item->brand->slug=='samsung')
                                    <div class="col-md-12 p-3 bg-gray">
                                        <p><span class="text-danger">Please remove your Find My Phone account before selling to us!</span> <a class="btn btn-sm btn-outline-warning" href="">Learn how →</a> </p>
                                    </div>
                                @else
                                    <div class="col-md-12 p-3 bg-gray">
                                        <p>Please remove any locks on your phone before selling to us. Your payment may be delayed if your phone is locked on arrival.</p>
                                    </div>
                                @endif
                                <p><span class="text-danger">Please remove your Find My Phone account before selling to us!</span> <a class="btn btn-sm btn-outline-warning" href="">Learn how →</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-12 ml-auto mr-auto">
                    <ul class="single-product-tab-list nav">
                        <li><a href="#product-description" class="active" data-toggle="tab" >description</a></li>
                        <li><a href="#product-specifications" data-toggle="tab" >specifications</a></li>
                        <li><a href="#product-grading" data-toggle="tab" >Grading System</a></li>
                        <li><a href="#product-reviews" data-toggle="tab" >reviews</a></li>
                    </ul>
                    <div class="single-product-tab-content tab-content">
                        <div class="tab-pane fade show active" id="product-description">

                            <div class="row">
                                <div class="single-product-description-content col-lg-8 col-12">
                                    {!! $item->long_desc ?? '' !!}
                                </div>
                                <div class="single-product-description-image col-lg-4 col-12">
                                    <img src="{{ asset("theme/assets/images/single-product/description.png") }}" alt="{{ $item->name }}">
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="product-specifications">
                            <div class="single-product-specification">
                                <ul>
                                    <li>{{ $item->memory->name ?? '' }}</li>
                                    <li>{{ $item->network->name ?? '' }}</li>
                                    <li>{{ $item->condition->name ?? '' }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product-grading">
                            <div class="col-lg-12 col-12 ml-auto mr-auto py-3">
                                <div class="row">
                                    @foreach($category->conditions as $condition)
                                        <div class="col-lg-4 col-md-6 col-12 mb-10">
                                            <h4 class="text-info">{{ $condition->name }}</h4>
                                            <p>{{ $condition->desc }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product-reviews">
                            <div class="product-ratting-wrap">
                                <div class="pro-avg-ratting">
                                    <h4>4.5 <span>(Overall)</span></h4>
                                    <span>Based on 9 Comments</span>
                                </div>
                                <div class="ratting-list">
                                    <div class="sin-list float-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span>(5)</span>
                                    </div>
                                    <div class="sin-list float-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>(3)</span>
                                    </div>
                                    <div class="sin-list float-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>(1)</span>
                                    </div>
                                    <div class="sin-list float-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>(0)</span>
                                    </div>
                                    <div class="sin-list float-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>(0)</span>
                                    </div>
                                </div>
                                <div class="rattings-wrapper">

                                    <div class="sin-rattings">
                                        <div class="ratting-author">
                                            <h3>Cristopher Lee</h3>
                                            <div class="ratting-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span>(5)</span>
                                            </div>
                                        </div>
                                        <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                    </div>

                                    <div class="sin-rattings">
                                        <div class="ratting-author">
                                            <h3>Nirob Khan</h3>
                                            <div class="ratting-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span>(5)</span>
                                            </div>
                                        </div>
                                        <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                    </div>

                                    <div class="sin-rattings">
                                        <div class="ratting-author">
                                            <h3>MD.ZENAUL ISLAM</h3>
                                            <div class="ratting-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span>(5)</span>
                                            </div>
                                        </div>
                                        <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                    </div>

                                </div>
                                <div class="ratting-form-wrapper fix">
                                    <h3>Add your Comments</h3>
                                    <form action="#">
                                        <div class="ratting-form row">
                                            <div class="col-12 mb-15">
                                                <h5>Rating:</h5>
                                                <div class="ratting-star fix">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-15">
                                                <label for="name">Name:</label>
                                                <input id="name" placeholder="Name" type="text">
                                            </div>
                                            <div class="col-md-6 col-12 mb-15">
                                                <label for="email">Email:</label>
                                                <input id="email" placeholder="Email" type="text">
                                            </div>
                                            <div class="col-12 mb-15">
                                                <label for="your-review">Your Review:</label>
                                                <textarea name="review" id="your-review" placeholder="Write a review"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <input value="add review" type="submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
                    <div class="section-title-one" data-title="How to Sell"><h1>How do I sell my phone?</h1></div>
                </div>
                <div class="row text-center">
                    <div class="col-lg-4 col-md-6 col-12 mb-30">
                        <i class="fas fa-phone-slash"></i>
                        <h3>Confirm Sale</h3>
                        <p>Complete your sale today to lock in your price. We guarantee to pay this price or we’ll send your device straight back to you – for free.</p>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-30">
                        <i class="fas fa-phone-slash"></i>
                        <h3>Send Your Device</h3>
                        <p>We’ll send you a fully insured & pre-paid shipping box to send your device to us. Trackable via Royal Mail’s 24 Hour service.</p>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-30">
                        <i class="fas fa-phone-slash"></i>
                        <h3>Receive Your Payment</h3>
                        <p>We’ll send you your payment on the same day we receive your device – just choose how you would like to be paid at checkout.</p>
                    </div>
                </div>
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
        $("select").on('change', function (e){
            e.preventDefault();
            var m = Number($("select[name='memory']").val());
            var n = Number($("select[name='network']").val());
            var c = Number($("select[name='condition']").val());
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
                    if(response!==0){
                        $(".update-price").html("{{ config('app.default_currency', "$") }}"+response);
                    }else{
                        $(".update-price").html("N/A");
                    }
                }
            })
        });
    </script>
@endsection

@section('subscriber-section')@endsection
