@section('hero-section')
    <!-- Slider Start -->
    <div class="slider-area slider-height-1">
        <div class="hero-slider swiper-container">
            <div class="swiper-wrapper">
                <!-- Single Slider  -->
                <div class="swiper-slide bg-img d-flex" style="background-image: url({{ asset("theme/assets/images/hero/hero-1.png") }});">
                    <div class="container align-self-center">
                        <div class="slider-content-1 slider-animated-1 text-left pl-60px">
                            <span class="animated color-gray">HURRY UP!</span>
                            <h1 class="animated color-black">
                                Amazing Deals On <br />
                                <strong>Premium Smartphones</strong>
                            </h1>
                            <a href="{{ route("services.show", 'buy') }}" class="shop-btn animated">SHOP</a>
                        </div>
                    </div>
                </div>
                <!-- Single Slider  -->
                <div class="swiper-slide bg-img d-flex" style="background-image: url({{ asset("theme/assets/images/hero/hero-2.png") }});">
                    <div class="container align-self-center">
                        <div class="slider-content-1 slider-animated-1 text-left pl-60px">
                            <span class="animated color-gray">Sell Your Device </span>
                            <h1 class="animated color-black">
                                Get <strong class="big">Paid</strong> Instantly
                            </h1>
                            <a href="{{ route('services.show', 'sell') }}" class="shop-btn animated">{{ __('Sell') }}</a>
                        </div>
                    </div>
                </div>
                <!-- Single Slider  -->
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
        </div>
    </div>
    <!-- Slider End -->
@endsection
