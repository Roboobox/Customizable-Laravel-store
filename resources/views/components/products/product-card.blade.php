@props(['product'])
<div class="product-wrap">
    <div class="product text-center">
        <figure class="product-media">
            <a href="{{ route('product', ['product' => $product->slug]) }}">
                <img src="{{ $product->photos->first()->photo_path }}" alt="Product" width="300"
                     height="338" />
            </a>
            @if($product->activeDiscounts->first())
                <div class="product-countdown-container">
                    <div class="product-countdown countdown-compact" data-until="{{  date('Y', strtotime($product->activeDiscounts->first()->ending_at)) }}, {{  date('m', strtotime($product->activeDiscounts->first()->ending_at)) }}, {{  date('d', strtotime($product->activeDiscounts->first()->ending_at)) }}"
                         data-format="DHMS" data-compact="false"
                         data-labels-short="Days, Hours, Mins, Secs">
                        00:00:00:00</div>
                </div>
            @endif
{{--            <div class="product-action-horizontal">--}}
{{--                <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                   title="Add to cart"></a>--}}
{{--                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                   title="Wishlist"></a>--}}
{{--                <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                   title="Compare"></a>--}}
{{--                <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                   title="Quick View"></a>--}}
{{--            </div>--}}
        </figure>
        <div class="product-details">
            <div class="product-cat">
{{--                TODO : Add category link--}}
                <a href="#">{{ $product->category->name }}</a>
            </div>
            <h3 class="product-name">
                <a href="{{ route('product', ['product' => $product->slug]) }}">{{ $product->name }}</a>
            </h3>
            <div class="product-pa-wrapper">
                <div class="product-price">
                @if($product->activeDiscounts->first())
                    <ins class="new-price">${{ $product->getFinalPrice($product->activeDiscounts) }}</ins>
                    <del class="old-price">${{ $product->price }}</del>
                @else
                    ${{ $product->price }}
                @endif
                </div>
            </div>
        </div>
    </div>
</div>