<x-layout body-class="product">
    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/photoswipe/photoswipe.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/photoswipe/default-skin/default-skin.min.css') }}">
    </x-slot>

    <x-slot name="main">
        <x-breadcrumbs></x-breadcrumbs>
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        <div class="product product-single row">
                            <div class="col-md-6 mb-6">
                                <div class="product-gallery product-gallery-sticky">
                                    <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                        <div class="swiper-wrapper row cols-1 gutter-no">
                                            @foreach($product->photos as $photo)
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{ $photo->photo_path }}"
                                                             data-zoom-image="{{ $photo->photo_path }}"
                                                             alt="{{ $product->name }}" width="800" height="900">
                                                    </figure>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                        <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                                    </div>
                                    <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                        <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                            @foreach($product->photos as $photo)
                                                <div class="product-thumb swiper-slide">
                                                    <img src="{{ $photo->photo_path }}"
                                                         alt="Product Thumb" width="800" height="900">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-6">
                                <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                    <h1 class="product-title">{{ $product->name }}</h1>
                                    <div class="product-bm-wrapper">
{{--                                        <figure class="brand">--}}
{{--                                            <img src="assets/images/products/brand/brand-1.jpg" alt="Brand"--}}
{{--                                                 width="102" height="48" />--}}
{{--                                        </figure>--}}
                                        <div class="product-meta">
                                            <div class="product-categories">
                                                Category:
{{--                                                TODO : Add category route--}}
                                                <span class="product-category"><a href="#">{{ $product->category->name }}</a></span>
                                            </div>
{{--                                            <div class="product-sku">--}}
{{--                                                SKU: <span>MS46891340</span>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="product-price"><ins class="new-price">{{ $product->price }}$</ins></div>

                                    <div class="product-short-desc">
                                        <ul class="list-type-check list-style-none">
                                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                                        </ul>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="product-variation-price">
                                        <span></span>
                                    </div>

                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container">
                                            <div class="product-qty-form">
                                                <div class="input-group">
                                                    <input class="quantity form-control" type="number" min="1"
                                                           max="10000000">
                                                    <button class="quantity-plus w-icon-plus"></button>
                                                    <button class="quantity-minus w-icon-minus"></button>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-cart">
                                                <i class="w-icon-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#product-tab-description" class="nav-link active">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-specification" class="nav-link">Specification</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-tab-description">
                                    <div class="row mb-4">
                                        <div class="col-md-12 mb-5">
                                            {{ $product->description ?? 'Product has no description.' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-tab-specification">
                                    <ul class="list-none">
                                        @foreach($product->specifications as $specification)
                                            <li>
                                                <label>{{ $specification->label }}</label>
                                                <p>{{ $specification->data }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Main Content -->
                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">
                                <div class="widget widget-icon-box mb-6">
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-truck"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                            <p>For all orders over $99</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-bag"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Secure Payment</h4>
                                            <p>We ensure secure payment</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-money"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Money Back Guarantee</h4>
                                            <p>Any back within 30 days</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Icon Box -->

                                <div class="widget widget-banner mb-9">
                                    <div class="banner banner-fixed br-sm">
                                        <figure>
                                            <img src="{{ asset('assets/images/shop/banner3.jpg') }}" alt="Banner" width="266"
                                                 height="220" style="background-color: #1D2D44;" />
                                        </figure>
                                        <div class="banner-content">
                                            <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                                40<sup class="font-weight-bold">%</sup><sub
                                                    class="font-weight-bold text-uppercase ls-25">Off</sub>
                                            </div>
                                            <h4
                                                class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                                Ultimate Sale</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Banner -->
                                <x-product.more-products :more-products="$moreProducts"></x-product.more-products>
                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->
                </div>
            </div>
        </div>

    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('assets/vendor/sticky/sticky.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/photoswipe/photoswipe.js') }}"></script>
        <script src="{{ asset('assets/vendor/photoswipe/photoswipe-ui-default.js') }}"></script>
        <script src="{{ asset('assets/vendor/zoom/jquery.zoom.js') }}"></script>
    </x-slot>

</x-layout>
