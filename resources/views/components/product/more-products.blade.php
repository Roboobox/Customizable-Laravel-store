@props(['moreProducts'])
<div class="widget widget-products">
    <div class="title-link-wrapper mb-2">
        <h4 class="title title-link font-weight-bold">More Products</h4>
    </div>

    <div class="swiper nav-top">
        <div class="swiper-container swiper-theme nav-top" data-swiper-options = "{
                                                'slidesPerView': 1,
                                                'spaceBetween': 20,
                                                'navigation': {
                                                    'prevEl': '.swiper-button-prev',
                                                    'nextEl': '.swiper-button-next'
                                                }
                                            }">
            <div class="swiper-wrapper">
{{--                Split products in groups of three--}}
                @php
                  $counter = 0;
                @endphp
                @foreach($moreProducts as $product)
                    @if($loop->first)
                        <div class="widget-col swiper-slide">
                    @endif
                            <div class="product product-widget">
                                <figure class="product-media">
                                    <a href="{{ route('product', ['product' => $product->slug]) }}">
                                        <img src="{{ asset('assets/images/store/products/' . $product->photos->first()->photo_path) }}" alt="Product"
                                             width="100" height="113" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="{{ route('product', ['product' => $product->slug]) }}">{{ $product->name }}</a>
                                    </h4>
                                    <div class="product-price">${{ $product->price }}</div>
                                </div>
                            </div>
                    @if($loop->iteration % 3 == 0 && !$loop->first)
                        </div>
                        @if(!$loop->last)
                        <div class="widget-col swiper-slide">
                        @endif
                    @endif
                    @php
                      $counter = $loop->iteration
                    @endphp
                @endforeach
                @if($counter % 3 != 0)
                        </div>
                @endif
            </div>
            <button class="swiper-button-next"></button>
            <button class="swiper-button-prev"></button>
        </div>
    </div>
</div>
