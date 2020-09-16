@extends('layouts.app')

@section('title', $title ?? 'Products')

@section('content')

    <div class="product-section section mt-90 mb-90">
        <div class="container-fluid">
            <div class="row mb-90">
                <div class="col-lg-5 col-12 mb-20">
                    <div class="single-product-image">
                        <div class="tab-content">
                            <div id="single-image-1" class="tab-pane fade show active big-image-slider">
                                <div class="big-image"><img src="{{ asset("storage/products/{$item->image}") }}" alt="Big Image"><a href="{{ asset("storage/products/{$item->image}") }}" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                                <div class="big-image"><img src="{{ asset("storage/products/{$item->image}") }}" alt="Big Image"><a href="{{ asset("storage/products/{$item->image}") }}" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                                <div class="big-image"><img src="{{ asset("storage/products/{$item->image}") }}" alt="Big Image"><a href="{{ asset("storage/products/{$item->image}") }}" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-12 mb-20">
                    <div class="single-product-content">
                        <div class="head-content">
                            <div class="category-title">
                                <a href="{{ route('category.type', [$category->slug, $item->type->slug]) }}" class="cat">{{ $item->type->name }}</a>
                                <h5 class="title">{{ $item->name }}</h5>
                            </div>
                            <h5 class="price update-price">{{ config('app.default_currency' ?? '£') }}
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
                            <span class="availability">UNLOCKED • FULLY TESTED • 12 MONTH WARRANTY</span>
                            <form class="quantity-colors">
                                @if($item->type->id==2)
                                    <div class="colors">
                                        <h5>Function</h5>
                                        {{--                                        <select class="nice-select" data-id="{{ $item->id }}" data-key="{{ $category->id }}" name="memory">--}}
                                        {{--                                            @foreach($item->memories as $memory)--}}
                                        {{--                                                <option @if($memory->id===$item->memory['id']) selected @endif value="{{ $memory->id }}">{{ $memory->name }}</option>--}}
                                        {{--                                            @endforeach--}}
                                        {{--                                        </select>--}}
                                    </div>
                                @else
                                    <div class="colors">
                                        <h5>Memory</h5>
                                        <select class="nice-select" data-id="{{ $item->id }}" data-key="{{ $category->id }}" name="memory">
                                            @foreach($item->memories as $memory)
                                                <option @if($memory->id===$item->memory['id']) selected @endif value="{{ $memory->id }}">{{ $memory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if($item->colors->count() > 0)
                                    <div class="colors">
                                        <h5>Color</h5>
                                        <select class="nice-select" name="color">
                                            @foreach($item->colors as $color)
                                                <option value="{{ $color->slug }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
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
                            <div class="content">
                                <h4><span class="font-weight-bold text-info">12Months Warranty! </span> We have got you covered!</h4>
                                <p>Your device will come boxed with its original charger & a SIM opening tool.</p>
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
                    <div class="section-title-one" data-title="RELATED PRODUCT"><h1>RELATED PRODUCT</h1></div>
                </div><!-- Section Title End -->
                <!-- Product Tab Content Start -->
                <div class="col-12">
                    <div class="product-slider-wrap product-slider-arrow-one">
                        <!-- Product Slider Start -->
                        <div class="product-slider product-slider-4">
                            @foreach($category->items as $item)
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
                                                <a href="{{ route("category.type", [$category->slug, $item->type->slug]) }}" class="cat">{{ $item->type->name }}</a>
                                                <h5 class="title"><a href="{{ route("category.item", [$category->slug, $item->slug]) }}">{{ $item->name }}</a></h5>
                                            </div>
                                            <div class="price-ratting">
                                                {{-- <h5 class="price">{{ config('app.default_currency' ?? '£') }}{{ $item->price->sales ?? '' }}</h5>--}}
                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
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
        $("select").on('change', function (e){
            e.preventDefault();
            var m = Number($("select[name='memory']").val());
            var c = Number($("select[name='condition']").val());
            var s = $(this).data("key");
            var i = $(this).data("id");

            $.ajax({
                url: "/furbished-price",
                data: { i:i, m: m, c:c, s:s },
                type: 'POST',headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (response) {
                    if(response!==0){
                        $(".update-price").html("{{ config('app.default_currency', "$") }}"+response);
                    }
                    else{
                        $(".update-price").html("N/A");
                    }
                }
            })
        });
    </script>
@endsection

@section('subscriber-section')@endsection
