@extends('layouts.app')

@section('title', 'Home Page')

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
    <!-- cart area start -->
    <div class="cart-main-area mtb-60px">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            @if(Session::has('cart'))
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive cart-table-content" id="buyingItemsCart">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Until Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a  href="#"><img class="img-responsive" src="{{ asset("storage/products/{$item['item']['image']}") }}" alt="{{ $item['item']['name'] }}" /></a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#" class="pb-2">{{ $item['item']['name'] }}</a><br><br>
                                                @isset($item['item']['model']['memory'])<span class="badge badge-theme p-1">{{ $item['item']['model']['memory'] ?? '' }}</span>@endif
                                                @isset($item['item']['model']['condition'])<span class="badge badge-theme p-1">{{ $item['item']['model']['condition'] ?? '' }}</span>@endif
                                                @isset($item['item']['model']['repair_name'])<span class="badge badge-theme p-1">{{ $item['item']['model']['repair_name'] ?? '' }}</span>@endif
                                                @isset($item['item']['color'])<span class="badge badge-theme p-1">{{ $item['item']['color'] ?? '' }}</span>@endif
                                            </td>
                                            <td class="product-price-cart"><span class="amount">{{ config('app.default_currency' ?? '$') }} {{ $item['item']['price'] }}</span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box disabled" disabled type="text" name="qtybutton" value="{{ $item['quantity'] }}" />
                                                </div>
                                            </td>
                                            <td class="product-subtotal">{{ config('app.default_currency' ?? '$') }} {{ $item['price'] }}</td>
                                            <td class="product-remove">
                                                <a href="#"><i class="icon-pencil"></i></a>
                                                <a href="#" data-id="{{ $item['item']['id'] }}" class="remove-buying-item-from-cart"><i class="icon-close"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="{{ route("/") }}">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <button>Update Shopping Cart</button>
                                            <a href="{{ route("cart.clear") }}">Clear Shopping Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row justify-content-end">
                            <div class="col-lg-4 col-md-12 mt-md-30px">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>
                                    <h5>Total products <span>{{ config('app.default_currency') ?? '' }} {{ $totalPrice }}</span></h5>
                                    <h4 class="grand-totall-title">Grand Total <span>{{ config('app.default_currency') ?? '' }} {{ $totalPrice }}</span></h4>
                                    <a href="{{ route("checkout") }}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- cart area end -->
@endsection

@section('stylesheets')@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
