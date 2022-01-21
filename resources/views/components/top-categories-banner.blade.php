<section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
    <div class="container pb-2">
        <h2 class="title justify-content-center pt-1 ls-normal mb-5">Top Categories Of The Month</h2>
        <div class="swiper">
            <div class="swiper-container swiper-theme pg-show" data-swiper-options="{
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
                    }
                }
            }">
                <div class="swiper-wrapper row cols-lg-6 cols-md-5 cols-sm-3 cols-2">
                    <div
                        class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                        <a href="{{ route('products') }}" class="category-media">
                            <img src="{{ asset('assets/images/demos/demo1/categories/2-1.jpg') }}" alt="Category"
                                 width="130" height="130">
                        </a>
                        <div class="category-content">
                            <h4 class="category-name">Basketball</h4>
                            <a href="{{ route('products') }}"
                               class="btn btn-primary btn-link btn-underline">Shop
                                Now</a>
                        </div>
                    </div>
                    <div
                        class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                        <a href="{{ route('products') }}" class="category-media">
                            <img src="{{ asset('assets/images/demos/demo1/categories/2-2.jpg') }}" alt="Category"
                                 width="130" height="130">
                        </a>
                        <div class="category-content">
                            <h4 class="category-name">Handball</h4>
                            <a href="{{ route('products') }}"
                               class="btn btn-primary btn-link btn-underline">Shop
                                Now</a>
                        </div>
                    </div>
                    <div
                        class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                        <a href="{{ route('products') }}" class="category-media">
                            <img src="{{ asset('assets/images/demos/demo1/categories/2-3.jpg') }}" alt="Category"
                                 width="130" height="130">
                        </a>
                        <div class="category-content">
                            <h4 class="category-name">Soccer</h4>
                            <a href="{{ route('products') }}"
                               class="btn btn-primary btn-link btn-underline">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
