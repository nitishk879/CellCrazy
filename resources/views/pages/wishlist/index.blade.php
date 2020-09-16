@extends('layouts.app')

@section('title', $title ?? 'Wishlist')

@section('content')
    <!-- Wishlist area start -->
    <div class="cart-main-area mtb-60px">
        <div class="container">
            <h3 class="cart-page-title">{{ $title ?? __("You have following items to sell") }}</h3>
            <div class="row">
                @isset($items)
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content" id="sellingItemCart">
                            <table>
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Add To Cart</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a  href="#"><img class="img-responsive" src="{{ asset("storage/products/{$item['item']['image']}") }}" alt="{{ $item['item']['name'] }}" /></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="#">{{ $item['item']['name'] }}</a><br><br>
                                            @isset($item['item']['model']['memory'])<span class="badge badge-theme p-1">{{ $item['item']['model']['memory'] ?? '' }}</span>@endif
                                            @isset($item['item']['model']['network'])<span class="badge badge-theme p-1">{{ $item['item']['model']['network'] ?? '' }}</span>@endif
                                            @isset($item['item']['model']['condition'])<span class="badge badge-theme p-1">{{ $item['item']['model']['condition'] ?? '' }}</span>@endif
                                        </td>
                                        <td class="product-price-cart"><span class="amount">{{ config('app.default_currency') }}{{ $item['item']['price'] }}</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box disabled" disabled type="text" name="qtybutton" value="{{ $item['quantity'] }}" />
                                            </div>
                                        </td>
                                        <td class="product-subtotal">{{ config('app.default_currency') }}{{ $item['price'] }}</td>
                                        <td class="product-wishlist-cart">
                                            <a href="#" data-id="{{ $item['item']['id'] }}" class="bg-danger remove-selling-item-from-cart"><i class="icon-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endisset
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-shiping-update-wrapper">
                        <div class="cart-shiping-update">
                            <a href="{{ route("/") }}">Add More Item</a>
                        </div>
                        <div class="cart-clear">
                            <button>Update Selling Cart</button>
                            <a href="{{ route("cart.clear") }}">Clear Selling Cart</a>
                        </div>
                    </div>
                </div>
            </div>
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
    <!-- Wishlist area end -->
@endsection

@section('stylesheets')@endsection

@section('breadcrumb')
    <ul class="nav">
        <li><a href="{{ route("/") }}">Home</a></li>
        <li>{{ $title ?? '' }}</li>
    </ul>
@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
