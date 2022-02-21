<!-- Start of Header -->
@props(['productCategories', 'cartItemCount', 'storeSettings'])
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
            </div>
            <div class="header-right">
                <!-- End of Dropdown Menu -->
                <a href="{{ route('about') }}" class="d-lg-show header-contact-us">About Us</a>
                <a href="{{ route('contact') }}" class="d-lg-show header-contact-us">Contact Us</a>
                <span class="divider d-lg-show"></span>
                @auth
                    <a href="{{ route('account') }}" class="d-lg-show">My Account</a>
                @else
                    <a href="{{ route('auth-popup') }}" class="d-lg-show login sign-in"><i
                            class="w-icon-account"></i>Sign In</a>
                    <span class="delimiter d-lg-show">/</span>
                    <a href="{{ route('auth-popup') }}" class="ml-0 d-lg-show login register">Register</a>
                @endauth
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="{{ route('home') }}" class="logo ml-lg-0">
                    <img src="{{ asset('assets/images/store/logos/' . ($storeSettings->get('logo_file')->value ?? '')) }}" alt="logo" width="144" height="45" />
                </a>
                <form method="get" action="{{ route('products') }}"
                      class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    <div class="select-box">
                        <select id="category" name="c">
                            <option value="" selected>All Categories</option>
                            @foreach($productCategories as $category)
                                <option {{ Request::input('c') == $category->slug ? 'selected' : '' }} value="{{ $category->slug }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="text" class="form-control" name="s" value="{{ Request::input('s') }}" id="search" placeholder="Search in..."
                           required />
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                @if($storeSettings->get('email') || $storeSettings->get('phone'))
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <div class="call-info d-lg-show">
                        @if($storeSettings->get('email'))
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="mailto:{{ $storeSettings->get('email')->value }}">{{ $storeSettings->get('email')->value }}</a>
                        </h4>
                        @endif
                        @if($storeSettings->get('phone'))
                        <a href="tel:{{ $storeSettings->get('phone')->value }}" class="phone-number font-weight-bolder ls-50">{{ $storeSettings->get('phone')->value }}</a>
                        @endif
                    </div>
                </div>
                @endunless

                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                    <div class="cart-overlay"></div>
                    <a href="#" class="cart-toggle label-down link">
                        <i class="w-icon-cart">
                            <span class="cart-count">{{ $cartItemCount ?? 0 }}</span>
                        </i>
                        <span class="cart-label">Cart</span>
                        <input type="hidden" value="{{ route('cart-get-summary') }}">
                    </a>
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <span>Shopping Cart</span>
                            <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                        <div class="cart-summary-container">

                        </div>
                    </div>
                    <!-- End of Dropdown Box -->
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    <div class="dropdown category-dropdown has-border" data-visible="true">
                        <a href="#" class="category-toggle {{ Route::is('home') ? 'text-dark' : '' }}" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="true" data-display="static"
                           title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>Browse Categories</span>
                        </a>

                        <div class="dropdown-box">
                            <ul class="menu vertical-menu category-menu">
                                @foreach($productCategories as $productCategory)
                                    <li>
                                        <a href="{{ route('products-category', ['category' => $productCategory->slug])}}">
                                            @if($productCategory->icon)
                                                <i class="{{ $productCategory->icon }}"></i>
                                            @endif
                                            {{ $productCategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{ route('products') }}"
                                       class="font-weight-bold text-primary text-uppercase ls-25">
                                        View All Categories<i class="w-icon-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <nav class="main-nav">
                        <ul class="menu active-underline">
                            <x-header.header-pages></x-header.header-pages>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <a href="{{ route('orders') }}" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of Header -->
