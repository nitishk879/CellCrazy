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
                                <a href="{{ route('categories.show', $item->type->slug) }}" class="cat">{{ $item->type['name'] }}</a>
                                <h5 class="title">{{ $item->name }}</h5>
                            </div>
                            <h5 class="price update-price">
                                {{ config('app.default_currency' ?? '£') }}
                                @php $model = $item->models()->where('category_id', $category->id)->firstOrFail() @endphp
                                {{ $model->price->sales ?? $model->price->regular ?? '' }}
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
                            <form class="row quantity-colors" id="brandNew">
                                <div class="col-md-8 col-lg-8 colors">
                                    <h5>Repair Type</h5>
                                    @if($item->repairs->count() > 0)
                                        <select class="custom-select" data-id="{{ $item->id }}" data-key="{{ $category->id }}" name="repair">
                                            @foreach($item->repairs as $repair)
                                                <option @if($repair->id===$item->repair['id']) selected @endif value="{{ $repair->id }}">{{ $repair->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </form>
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
        <div class="container-fluid">
            <div class="row">

                <!-- Section Title Start -->
                <div class="col-12 mb-40">
                    <div class="section-title-one" data-title="RELATED PRODUCT"><h1>RELATED PRODUCT</h1></div>
                </div><!-- Section Title End -->

                <!-- Product Tab Content Start -->
                <div class="col-12">

                    <!-- Product Slider Wrap Start -->
                    <div class="product-slider-wrap product-slider-arrow-one">
                        <!-- Product Slider Start -->
                        <div class="product-slider product-slider-4">

                            <div class="col pb-20 pt-10">
                                <!-- Product Start -->
                                <div class="ee-product">

                                    <!-- Image -->
                                    <div class="image">

                                        <a href="single-product.html" class="img"><img src="assets/images/product/product-1.png" alt="Product Image"></a>

                                        <div class="wishlist-compare">
                                            <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                            <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                        </div>

                                        <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                                    </div>

                                    <!-- Content -->
                                    <div class="content">

                                        <!-- Category & Title -->
                                        <div class="category-title">

                                            <a href="#" class="cat">Laptop</a>
                                            <h5 class="title"><a href="single-product.html">Zeon Zen 4 Pro</a></h5>

                                        </div>

                                        <!-- Price & Ratting -->
                                        <div class="price-ratting">

                                            <h5 class="price">$295.00</h5>
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

                            <div class="col pb-20 pt-10">
                                <!-- Product Start -->
                                <div class="ee-product">

                                    <!-- Image -->
                                    <div class="image">

                                        <span class="label sale">sale</span>

                                        <a href="single-product.html" class="img"><img src="assets/images/product/product-2.png" alt="Product Image"></a>

                                        <div class="wishlist-compare">
                                            <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                            <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                        </div>

                                        <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                                    </div>

                                    <!-- Content -->
                                    <div class="content">

                                        <!-- Category & Title -->
                                        <div class="category-title">

                                            <a href="#" class="cat">Drone</a>
                                            <h5 class="title"><a href="single-product.html">Aquet Drone D 420</a></h5>

                                        </div>

                                        <!-- Price & Ratting -->
                                        <div class="price-ratting">

                                            <h5 class="price"><span class="old">$350</span>$275.00</h5>
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

                            <div class="col pb-20 pt-10">
                                <!-- Product Start -->
                                <div class="ee-product">

                                    <!-- Image -->
                                    <div class="image">

                                        <a href="single-product.html" class="img"><img src="assets/images/product/product-3.png" alt="Product Image"></a>

                                        <div class="wishlist-compare">
                                            <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                            <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                        </div>

                                        <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                                    </div>

                                    <!-- Content -->
                                    <div class="content">

                                        <!-- Category & Title -->
                                        <div class="category-title">

                                            <a href="#" class="cat">Games</a>
                                            <h5 class="title"><a href="single-product.html">Game Station X 22</a></h5>

                                        </div>

                                        <!-- Price & Ratting -->
                                        <div class="price-ratting">

                                            <h5 class="price">$295.00</h5>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>

                                        </div>

                                    </div>

                                </div><!-- Product End -->
                            </div>

                            <div class="col pb-20 pt-10">
                                <!-- Product Start -->
                                <div class="ee-product">

                                    <!-- Image -->
                                    <div class="image">

                                        <a href="single-product.html" class="img"><img src="assets/images/product/product-4.png" alt="Product Image"></a>

                                        <div class="wishlist-compare">
                                            <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                            <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                        </div>

                                        <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                                    </div>

                                    <!-- Content -->
                                    <div class="content">

                                        <!-- Category & Title -->
                                        <div class="category-title">

                                            <a href="#" class="cat">Accessories</a>
                                            <h5 class="title"><a href="single-product.html">Roxxe Headphone Z 75</a></h5>

                                        </div>

                                        <!-- Price & Ratting -->
                                        <div class="price-ratting">

                                            <h5 class="price">$110.00</h5>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>

                                        </div>

                                    </div>

                                </div><!-- Product End -->
                            </div>

                            <div class="col pb-20 pt-10">
                                <!-- Product Start -->
                                <div class="ee-product">

                                    <!-- Image -->
                                    <div class="image">

                                        <a href="single-product.html" class="img"><img src="assets/images/product/product-5.png" alt="Product Image"></a>

                                        <div class="wishlist-compare">
                                            <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                            <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                        </div>

                                        <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                                    </div>

                                    <!-- Content -->
                                    <div class="content">

                                        <!-- Category & Title -->
                                        <div class="category-title">

                                            <a href="#" class="cat">Camera</a>
                                            <h5 class="title"><a href="single-product.html">Mony Handycam Z 105</a></h5>

                                        </div>

                                        <!-- Price & Ratting -->
                                        <div class="price-ratting">

                                            <h5 class="price">$110.00</h5>
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

                        </div><!-- Product Slider End -->
                    </div><!-- Product Slider Wrap End -->

                </div><!-- Product Tab Content End -->

            </div>
        </div>
    </div>
    <!-- Related Product Section End -->

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
                type: 'POST',headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (response) {
                    if(response!==0){
                        $(".update-price").html("{{ config('app.default_currency') }}"+response);
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
