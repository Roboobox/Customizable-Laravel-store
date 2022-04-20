@props(['product'])
<div class="product-wrap">
    <div class="product text-center product-grid">
        <figure class="product-media">
            <a href="{{ route('product', ['product' => $product->slug]) }}">
                <img src="{{ asset('assets/images/store/products/' . $product->photos->first()->photo_path) }}" alt="Product" width="300"
                     height="338" />
            </a>
            @if($product->discount)
                <div class="product-countdown-container">
                    <div class="product-countdown countdown-compact" data-until="{{  date('Y', strtotime($product->discount->ending_at)) }}, {{  date('m', strtotime($product->discount->ending_at)) }}, {{  date('d', strtotime($product->discount->ending_at)) }}"
                         data-format="DHMS" data-compact="false"
                         data-labels-short="Days, Hours, Mins, Secs">
                        00:00:00:00</div>
                </div>
            @endif
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
                @if($product->discount)
                    <ins class="new-price">${{ $product->getFinalPrice($product->discount) }}</ins>
                    <del class="old-price">${{ $product->price }}</del>
                @else
                    ${{ $product->price }}
                @endif
                </div>
            </div>
            <div>
                <form class="cart_quick_add" action="{{ route('cart-add') }}" method="post">
                    <div class="d-flex align-items-center">
                        <div class="product-qty-form mr-2" data-price="{{ $product->price }}">
                            <div class="input-group">
                                <input value="1" class="quantity form-control" name="quantity" type="number" min="1" max="10000000">
                                <button type="button" class="quantity-plus w-icon-plus"></button>
                                <button type="button" class="quantity-minus w-icon-minus"></button>
                            </div>
                        </div>
                        <input type="hidden" name="product" value="{{ $product->id }}">
                        @csrf
                        <button type="submit" class="btn-product btn-cart"
                                title="Add to Cart"><i class="w-icon-cart"></i></button>
                    </div>
                    <div class="mt-1 cart-message">Message</div>
                </form>
            </div>
        </div>
    </div>
</div>
