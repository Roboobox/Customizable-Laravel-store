<x-layout body-class="products">
    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
    </x-slot>

    <x-slot name="main">

        <div class="page-content">
            <div class="container">
                <!-- Start of Shop Banner -->
                <div id="shop_content_top" class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
                     style="background-image: url({{ asset('assets/images/shop/banner1.jpg') }}); background-color: #FFC74E;">
                    <div class="banner-content">
                        <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Smart Wrist
                            Watches</h3>
                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                            Now<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
                <!-- End of Shop Banner -->

                <!-- Start of Shop Category -->
                <div class="shop-default-category category-ellipse-section mb-6">
                    <div class="swiper-container swiper-theme shadow-swiper"
                         data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '480': {
                                    'slidesPerView': 3
                                },
                                '576': {
                                    'slidesPerView': 4
                                },
                                '768': {
                                    'slidesPerView': 6
                                },
                                '992': {
                                    'slidesPerView': 7
                                },
                                '1200': {
                                    'slidesPerView': 8,
                                    'spaceBetween': 30
                                }
                            }
                        }">
                        <div class="swiper-wrapper row gutter-lg cols-xl-8 cols-lg-7 cols-md-6 cols-sm-4 cols-xs-3 cols-2">
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="{{ asset('assets/images/categories/category-4.jpg') }}" alt="Categroy"
                                                 width="190" height="190" style="background-color: #5C92C0;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Sports</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="{{ asset('assets/images/categories/category-5.jpg') }}" alt="Categroy"
                                                 width="190" height="190" style="background-color: #B8BDC1;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Babies</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="{{ asset('assets/images/categories/category-6.jpg') }}" alt="Categroy"
                                                 width="190" height="190" style="background-color: #99C4CA;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Sneakers</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="{{ asset('assets/images/categories/category-7.jpg') }}" alt="Categroy"
                                                 width="190" height="190" style="background-color: #4E5B63;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Cameras</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="{{ asset('assets/images/categories/category-8.jpg') }}" alt="Categroy"
                                                 width="190" height="190" style="background-color: #D3E5EF;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Games</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="{{ asset('assets/images/categories/category-9.jpg') }}" alt="Categroy"
                                                 width="190" height="190" style="background-color: #65737C;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Kitchen</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="{{ asset('assets/images/categories/category-20.jpg') }}" alt="Categroy"
                                                 width="190" height="190" style="background-color: #E4E4E4;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Watches</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="{{ asset('assets/images/categories/category-21.jpg') }}" alt="Categroy"
                                                 width="190" height="190" style="background-color: #D3D8DE;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Clothes</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <!-- End of Shop Category -->
                <div class="shop-content-container p-relative">
                    <div class="loading-overlay"><div class="spinner loading"></div> </div>
                    <div class="shop-content row gutter-lg mb-10" {{ request()->route('category') ? 'data-category=' . request()->route('category')->slug : '' }} data-url="{{ route('ajax-products') }}">
    {{--                    <x-products.shop-content :products="$products"></x-products.shop-content>--}}
                    </div>
                </div>
            </div>
        </div>

    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('assets/vendor/sticky/sticky.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/nouislider/nouislider.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/zoom/jquery.zoom.js') }}"></script>
        <script src="{{ asset('assets/js/custom/products.js') }}"></script>
    </x-slot>

</x-layout>
