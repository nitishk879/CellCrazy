<div class="inner">
    <div class="head">
        <span class="title">Cart</span>
        <button class="offcanvas-close">×</button>
    </div>

    <div class="body customScroll">
        <ul class="minicart-product-list buy-cart-list">
            @if(Session::has('cart'))
                @foreach(Session::get('cart')->items as $item)
                    <li>
                        <a href="" class="image"><img src="{{ asset("storage/products/{$item['item']['image']}") }}" alt="{{ $item['item']['name'] }}"></a>
                        <div class="content">
                            <a href="{{ route("category.item", ['refurbished', $item['item']['slug']]) }}" class="title mb-1">{{ $item['item']['name'] }}</a><br>
                            @if($item['models']['memory'] ?? '') <span class="badge badge-primary"> {{ $item['models']['memory'] }}</span>@endif
                            @if($item['models']['condition'] ?? '') <span class="badge badge-primary"> {{ $item['models']['condition'] }}</span>@endif
                            @if($item['models']['network'] ?? '') <span class="badge badge-primary"> {{ $item['models']['network'] }}</span>@endif
                            @if($item['models']['repair_name'] ?? '') <span class="badge badge-primary"> {{ $item['models']['repair_name'] }}</span>@endif
                            <span class="quantity-price">{{ $item['quantity'] }} x <span class="amount">{{ $item['item']['price'] }}</span></span>
                            <a data-id="{{ $item['item']['id'] }}" href="#" class="remove remove-item">×</a>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="foot">
        <div class="sub-total mini-cart-subtotal buy-cart-subtotal">
            <strong>Subtotal :</strong>
            @if(Session::has('cart'))
                <span class="amount">{{ config('app.default_currency' ?? '£') }}{{ Session::get('cart')->totalPrice }}</span>
            @endif
        </div>
        <div class="buttons">
            <a href="{{ route('cart') }}" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
            <a href="checkout" class="btn btn-outline-dark current-btn">checkout</a>
        </div>
{{--        <p class="minicart-message">Free Shipping on All Orders Over $100!</p>--}}
    </div>
</div>

