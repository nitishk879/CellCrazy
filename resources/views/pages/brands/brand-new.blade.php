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
                            <h5 class="price update-price">{{ config('app.default_currency' ?? '£') }}{{ $item->models[0]->price['sales'] ?? $item->models[0]->price['regular'] }}</h5>
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
                                <div class="col-md-6 col-lg-4 colors">
                                    <h5>Memory</h5>
                                    @if($item->memories->count() > 0)
                                        <select class="nice-select" data-id="{{ $item->id }}" data-key="{{ $category->id }}" name="memory">
                                            @foreach($item->memories as $memory)
                                                <option @if($memory->id===$item->memory['id']) selected @endif value="{{ $memory->id }}">{{ $memory->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div class="col-md-6 col-lg-4 colors">
                                    <h5>Condition</h5>
                                    <select class="nice-select" data-id="{{ $item->id }}" data-key="{{ $category->id }}" name="condition">
                                        @foreach($category->conditions as $condition)
                                            <option class="badge badge-success p-2 text-white" value="{{ $condition->id }}">{{ $condition->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if($item->colors->count() > 0)
                                    <div class="col-md-6 col-lg-4 colors">
                                        <h5>Color</h5>
                                        <select class="nice-select" data-id="{{ $item->id }}" data-key="{{ $category->id }}" name="color">
                                            @foreach($item->colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </form>
                            <div class="tags">
                                <a href="" class="badge badge-primary text-white mb-2"><i class="fa fa-truck text-white-50"></i> Free Delivery</a>
                                <a href="" class="badge badge-primary text-white mb-2"><i class="fa fa-unlock text-white-50"></i> Unlocked</a>
                                <a href="" class="badge badge-primary text-white mb-2"><i class="fa fa-certificate text-white-50"></i> Certified Device</a>
                                <a href="" class="badge badge-primary text-white mb-2"><i class="fa fa-calendar text-white-50"></i> 14 days return</a>
                            </div>
                            <div class="actions">
                                <a href="#" data-id="{{ $item->slug }}" data-key="{{ $category->id }}" class="add-to-cart @if(Session::has('cart') && array_key_exists($item->id, Session::get('cart')->items)) added @endif"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                            </div>
                            <h4><span class="font-weight-bold text-info">12Months Warranty! </span> We have got you covered!</h4>
                            <p>Your device will come inside its original box with all its accessories included.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12 ml-auto mr-auto">
                    <ul class="single-product-tab-list nav">
                        <li><a href="#product-description" class="active" data-toggle="tab" >description</a></li>
                        <li><a href="#product-specifications" data-toggle="tab" >specifications</a></li>
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
                        <div class="tab-pane fade" id="product-specifications"></div>
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
    </div><!-- Related Product Section End -->

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
            var s = $(this).data("key");
            var i = $(this).data("id");

            $.ajax({
                url: "/brand-new-price",
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
