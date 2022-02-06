@props(['recentlyViewed'])

<h2 class="title title-underline mb-4 ls-normal appear-animate mt-8">Your Recent Views</h2>
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
        @foreach($recentlyViewed as $product)
            <div class="swiper-slide product-wrap mb-0">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a href="{{ route('product', ['product' => $product->slug]) }}">
                            <img src="{{ asset('assets/images/store/products/' . $product->thumbnail->photo_path) }}" alt="Category image"
                                 width="130" height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <div class="product-category ">{{ $product->category->name }}</div>
                        <a href="{{ route('product', ['product' => $product->slug]) }}">{{ $product->name }}</a>
                    </h4>
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
