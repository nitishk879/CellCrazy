                            @isset($services)
                                @foreach($services as $service)
                                    <li class="menu-item-has-children"><a href="{{ route("services.show", $service->slug) }}">{{ $service->name }}</a>
                                        @if($service->categories->count()>0)
                                            <ul class="sub-menu">
                                                @foreach($service->categories as $category)
                                                    <li class="menu-item-has-children"><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
                                                        @if($category->types->count()>0)
                                                            <ul class="sub-menu">
                                                                @foreach($category->types as $type)
                                                                    @if($type->items->count()>0)
                                                                        <li><a href="{{ route("category.type", ["{$category->slug}", "{$type->slug}"]) }}">{{ $type->name }}</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        @if($service->id!==1)
                                            <ul class="sub-menu">
                                                @foreach($service->categories as $category)
                                                    @if($category->types->count()>0)
                                                        @foreach($category->types as $type)
                                                            @if($type->items->count()>0)
                                                                <li><a href="{{ route("category.type", ["{$category->slug}", "{$type->slug}"]) }}">{{ $type->name }}</a></li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            @endisset

<li class="menu-item-has-children"><a href="{{ route("services.show", "buy") }}">Shop</a>
    <ul class="sub-menu">
        <li class="menu-item-has-children"><a href="{{ route("categories.show", "brand-new") }}">Brand New</a>
            <ul class="sub-menu">
                <li><a href="{{ route("category.type", ['brand-new', 'phones']) }}">Phones</a></li>
                <li><a href="{{ route("category.type", ['brand-new', 'ipad']) }}">iPad</a></li>
            </ul>
        </li>
        <li class="menu-item-has-children"><a href="{{ route("categories.show", "refurbished") }}">Refurbished</a>
            <ul class="sub-menu">
                <li><a href="{{ route("category.type", ['refurbished', 'phones']) }}">Phones</a></li>
                <li><a href="{{ route("category.type", ['refurbished', 'ipad']) }}">iPad</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route("categories.show", "premium-accessories") }}">Premium Accessories</a>
        </li>
    </ul>
</li>


<div class="category-toggle-wrap d-block d-lg-none">
    <button class="category-toggle">Categories <i class="ti-menu"></i></button>
</div>
<nav class="category-menu">
    <ul class="justify-content-between">
        <li><a href="{{ route("category.type", ['freshen-up', 'phones']) }}">{{ __('Sell Phones') }}</a></li>
        <li><a href="{{ route("category.type", ['freshen-up', 'ipad']) }}">{{ __('Sell iPads') }}</a></li>
        <li><a href="{{ route('sell-mac') }}">{{ __('Sell Mac') }}</a></li>
        <li><a href="{{ route("category.type", ['repair', 'phones']) }}">{{ __('Repair Phones') }}</a></li>
        <li><a href="{{ route("category.type", ['repair', 'ipad']) }}">{{ __('Repair iPads') }}</a></li>
        <li><a href="">{{ __('Repair Mac') }}</a></li>
    </ul>
</nav>

Categories menu New theme Rozer:
<div class="header-menu-vertical">
    <h4 class="menu-title">All Categories</h4>
    @isset($services)
        <ul class="menu-content display-none">
            @foreach($services as $service)
                <li class="menu-item">
                    <a href="{{ route("services.show", $service->slug) }}">{{ $service->name ?? '' }} @if($service->categories->count() > 0) <i class="ion-ios-arrow-right"></i> @endif</a>
                    <ul class="sub-menu flex-wrap">
                        @foreach($service->categories as $category)
                            <li>
                                <a href="{{ route("categories.show", $category->slug) }}">
                                    <span> <strong> {{ $category->name ?? '' }}</strong></span>
                                </a>
                                <ul class="submenu-item">
                                    @foreach($category->items as $item)
                                        <li><a href="{{ route('category.item', [$category->slug, $item->slug]) }}">{{ $item->name ?? '' }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                    <!-- sub menu -->
                    @if($service->id>2) @break @endif
                </li>
            @endforeach
        </ul>
    @endisset
</div>
Mobile categories
<!-- Search Category End -->
<div class="mobile-category-nav d-xl-none mb-15px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!--=======  category menu  =======-->
                <div class="hero-side-category">
                    <!-- Category Toggle Wrap -->
                    <div class="category-toggle-wrap">
                        <!-- Category Toggle -->
                        <button class="category-toggle"><i class="fa fa-bars"></i> All Categories</button>
                    </div>

                    <!-- Category Menu -->
                    <nav class="category-menu">
                        <ul>
                            <li class="menu-item-has-children menu-item-has-children-1">
                                <a href="#">Accessories & Parts<i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-1">
                                    <li><a href="#">Cables & Adapters</a></li>
                                    <li><a href="#">Batteries</a></li>
                                    <li><a href="#">Chargers</a></li>
                                    <li><a href="#">Bags & Cases</a></li>
                                    <li><a href="#">Electronic Cigarettes</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children menu-item-has-children-2">
                                <a href="#">Camera & Photo<i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-2">
                                    <li><a href="#">Digital Cameras</a></li>
                                    <li><a href="#">Camcorders</a></li>
                                    <li><a href="#">Camera Drones</a></li>
                                    <li><a href="#">Action Cameras</a></li>
                                    <li><a href="#">Photo Studio Supplies</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children menu-item-has-children-3">
                                <a href="#">Smart Electronics <i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-3">
                                    <li><a href="#">Wearable Devices</a></li>
                                    <li><a href="#">Smart Home Appliances</a></li>
                                    <li><a href="#">Smart Remote Controls</a></li>
                                    <li><a href="#">Smart Watches</a></li>
                                    <li><a href="#">Smart Wristbands</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children menu-item-has-children-4">
                                <a href="#">Audio & Video <i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-4">
                                    <li><a href="#">Televisions</a></li>
                                    <li><a href="#">TV Receivers</a></li>
                                    <li><a href="#">Projectors</a></li>
                                    <li><a href="#">Audio Amplifier Boards</a></li>
                                    <li><a href="#">TV Sticks</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children menu-item-has-children-5">
                                <a href="#">Portable Audio & Video <i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-5">
                                    <li><a href="#">Headphones</a></li>
                                    <li><a href="#">Speakers</a></li>
                                    <li><a href="#">MP3 Players</a></li>
                                    <li><a href="#">VR/AR Devices</a></li>
                                    <li><a href="#">Microphones</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children menu-item-has-children-6">
                                <a href="#">Video Game <i class="ion-ios-arrow-down"></i></a>
                                <!-- category submenu -->
                                <ul class="category-mega-menu category-mega-menu-6">
                                    <li><a href="#">Handheld Game Players</a></li>
                                    <li><a href="#">Game Controllers</a></li>
                                    <li><a href="#">Joysticks</a></li>
                                    <li><a href="#">Stickers</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Televisions</a></li>
                            <li><a href="#">Digital Cameras</a></li>
                            <li><a href="#">Headphones</a></li>
                            <li><a href="#">Wearable Devices</a></li>
                            <li><a href="#">Smart Watches</a></li>
                            <li><a href="#">Game Controllers</a></li>
                            <li><a href="#"> Smart Home Appliances</a></li>
                            <li class="hidden"><a href="#">Projectors</a></li>
                            <li>
                                <a href="#" id="more-btn"><i class="ion-ios-plus-empty" aria-hidden="true"></i> More Categories</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!--=======  End of category menu =======-->
            </div>
        </div>
    </div>
</div>
<!-- Mobile Header Section End -->
