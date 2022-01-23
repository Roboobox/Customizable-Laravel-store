@props(['recentlyViewed'])

<h2 class="title title-underline mb-4 ls-normal appear-animate">Your Recent Views</h2>
<div id="recently_viewed" class="swiper-container swiper-theme shadow-swiper appear-animate pb-4 mb-8" data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 5
                        },
                        '992': {
                            'slidesPerView': 6
                        },
                        '1200': {
                            'slidesPerView': 8
                        }
                    }
                }">
    <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-2">
        @foreach($recentlyViewed as $view)
            @php
              $product = $view->product
            @endphp
            <div class="swiper-slide product-wrap mb-0">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a href="{{ route('product', ['product' => $product->slug]) }}">
                            <img src="{{ $product->photos->first()->photo_path }}" alt="Category image"
                                 width="130" height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="{{ route('product', ['product' => $product->slug]) }}">{{ $product->name }}</a>
                    </h4>
                </div>
            </div>
        @endforeach
{{--        <div class="swiper-slide product-wrap mb-0">--}}
{{--            <div class="product text-center product-absolute">--}}
{{--                <figure class="product-media">--}}
{{--                    <a href="product-defa{{ route('products') }}">--}}
{{--                        <img src="{{ asset('assets/images/demos/demo1/products/7-1.jpg') }}" alt="Category image"--}}
{{--                             width="130" height="146" style="background-color: #fff" />--}}
{{--                    </a>--}}
{{--                </figure>--}}
{{--                <h4 class="product-name">--}}
{{--                    <a href="{{ route('products') }}">Women's Fashion Handbag</a>--}}
{{--                </h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End of Product Wrap -->--}}
{{--        <div class="swiper-slide product-wrap mb-0">--}}
{{--            <div class="product text-center product-absolute">--}}
{{--                <figure class="product-media">--}}
{{--                    <a href="product-defa{{ route('products') }}">--}}
{{--                        <img src="{{ asset('assets/images/demos/demo1/products/7-2.jpg') }}" alt="Category image"--}}
{{--                             width="130" height="146" style="background-color: #fff" />--}}
{{--                    </a>--}}
{{--                </figure>--}}
{{--                <h4 class="product-name">--}}
{{--                    <a href="{{ route('products') }}">Electric Frying Pan</a>--}}
{{--                </h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End of Product Wrap -->--}}
{{--        <div class="swiper-slide product-wrap mb-0">--}}
{{--            <div class="product text-center product-absolute">--}}
{{--                <figure class="product-media">--}}
{{--                    <a href="product-defa{{ route('products') }}">--}}
{{--                        <img src="{{ asset('assets/images/demos/demo1/products/7-3.jpg') }}" alt="Category image"--}}
{{--                             width="130" height="146" style="background-color: #fff" />--}}
{{--                    </a>--}}
{{--                </figure>--}}
{{--                <h4 class="product-name">--}}
{{--                    <a href="{{ route('products') }}">Black Winter Skating</a>--}}
{{--                </h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End of Product Wrap -->--}}
{{--        <div class="swiper-slide product-wrap mb-0">--}}
{{--            <div class="product text-center product-absolute">--}}
{{--                <figure class="product-media">--}}
{{--                    <a href="product-defa{{ route('products') }}">--}}
{{--                        <img src="{{ asset('assets/images/demos/demo1/products/7-4.jpg') }}" alt="Category image"--}}
{{--                             width="130" height="146" style="background-color: #fff" />--}}
{{--                    </a>--}}
{{--                </figure>--}}
{{--                <h4 class="product-name">--}}
{{--                    <a href="{{ route('products') }}">HD Television</a>--}}
{{--                </h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End of Product Wrap -->--}}
{{--        <div class="swiper-slide product-wrap mb-0">--}}
{{--            <div class="product text-center product-absolute">--}}
{{--                <figure class="product-media">--}}
{{--                    <a href="product-defa{{ route('products') }}">--}}
{{--                        <img src="{{ asset('assets/images/demos/demo1/products/7-5.jpg') }}" alt="Category image"--}}
{{--                             width="130" height="146" style="background-color: #fff" />--}}
{{--                    </a>--}}
{{--                </figure>--}}
{{--                <h4 class="product-name">--}}
{{--                    <a href="{{ route('products') }}">Home Sofa</a>--}}
{{--                </h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End of Product Wrap -->--}}
{{--        <div class="swiper-slide product-wrap mb-0">--}}
{{--            <div class="product text-center product-absolute">--}}
{{--                <figure class="product-media">--}}
{{--                    <a href="product-defa{{ route('products') }}">--}}
{{--                        <img src="{{ asset('assets/images/demos/demo1/products/7-6.jpg') }}" alt="Category image"--}}
{{--                             width="130" height="146" style="background-color: #fff" />--}}
{{--                    </a>--}}
{{--                </figure>--}}
{{--                <h4 class="product-name">--}}
{{--                    <a href="{{ route('products') }}">USB Receipt</a>--}}
{{--                </h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End of Product Wrap -->--}}
{{--        <div class="swiper-slide product-wrap mb-0">--}}
{{--            <div class="product text-center product-absolute">--}}
{{--                <figure class="product-media">--}}
{{--                    <a href="product-defa{{ route('products') }}">--}}
{{--                        <img src="{{ asset('assets/images/demos/demo1/products/7-7.jpg') }}" alt="Category image"--}}
{{--                             width="130" height="146" style="background-color: #fff" />--}}
{{--                    </a>--}}
{{--                </figure>--}}
{{--                <h4 class="product-name">--}}
{{--                    <a href="{{ route('products') }}">Electric Rice-Cooker</a>--}}
{{--                </h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End of Product Wrap -->--}}
{{--        <div class="swiper-slide product-wrap mb-0">--}}
{{--            <div class="product text-center product-absolute">--}}
{{--                <figure class="product-media">--}}
{{--                    <a href="product-defa{{ route('products') }}">--}}
{{--                        <img src="{{ asset('assets/images/demos/demo1/products/7-8.jpg') }}" alt="Category image"--}}
{{--                             width="130" height="146" style="background-color: #fff" />--}}
{{--                    </a>--}}
{{--                </figure>--}}
{{--                <h4 class="product-name">--}}
{{--                    <a href="{{ route('products') }}">Table Lamp</a>--}}
{{--                </h4>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- End of Product Wrap -->
    </div>
    <div class="swiper-pagination"></div>
</div>
<!-- End of viewed Producs -->
