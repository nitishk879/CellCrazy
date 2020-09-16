<div class="inner">
    <div class="head">
        <span class="title">Sell your product</span>
        <button class="offcanvas-close">×</button>
    </div>

    <div class="body customScroll">
        <ul class="minicart-product-list product-selling-list">
            @if(Session::has('wishlist'))
                @foreach(Session::get('wishlist')->items as $item)
                    <li>
                        <a href="" class="image"><img src="{{ asset("storage/products/{$item['item']['image']}") }}" alt="{{ $item['item']['name'] ?? '' }}"></a>
                        <div class="content">
                            <a href="{{ route("category.item", ['freshen-up', $item['item']['slug']]) }}" class="title">{{ $item['item']['name'] ?? '' }}</a><br>
                            @if($item['models']['memory'] ?? '') <span class="badge badge-primary"> {{ $item['models']['memory'] }}</span>@endif
                            @if($item['models']['condition'] ?? '') <span class="badge badge-primary"> {{ $item['models']['condition'] }}</span>@endif
                            @if($item['models']['network'] ?? '') <span class="badge badge-primary"> {{ $item['models']['network'] }}</span>@endif
                            <span class="quantity-price">{{ $item['quantity'] }} x <span class="amount">{{ config('app.default_currency') }}{{ $item['item']['price'] }}</span></span>
                            <a data-id="{{ $item['item']['id'] }}" href="#" class="remove remove-sell-item">×</a>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="foot">
        <div class="sub-total mini-cart-subtotal sell-cart-subtotal">
            <strong>Subtotal :</strong>
            @if(Session::has('wishlist'))
                <span class="amount">{{ config('app.default_currency' ?? '£') }}{{ Session::get('wishlist')->totalPrice }}</span>
            @endif
        </div>
        <div class="buttons">
            <a href="{{ route("selling") }}" class="btn btn-dark btn-hover-primary mt-30px">view</a>
        </div>
    </div>
</div>
