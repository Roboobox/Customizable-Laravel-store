@props(['cartItems'])
@php
$total = 0.00;
@endphp
<div class="products">
    <div class="loading-overlay"><div class="spinner loading"></div> </div>
    @if(!empty($cartItems))
    @foreach($cartItems as $cartItem)
        @php
            $total += $cartItem->product->price * $cartItem->quantity;
        @endphp
        <div class="product product-cart">
            <div class="product-detail">
                <a href="{{ route('product', ['product' => $cartItem->product->slug]) }}" class="product-name">
                    {{ $cartItem->product->name }}
                </a>
                <div class="price-box">
                    <span class="product-quantity">{{ $cartItem->quantity }}</span>
                    <span class="product-price">${{ $cartItem->product->price }}</span>
                </div>
            </div>
            <figure class="product-media">
                <a href="{{ route('products') }}">
                    <img src="{{ asset('assets/images/store/products/' . $cartItem->product->thumbnail->photo_path) }}" alt="product" height="84"
                         width="94" />
                </a>
            </figure>
            <button class="btn btn-link btn-close" aria-label="button">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @if ($loop->iteration > 1)
            <a class="mt-3 mb-0 justify-content-center" href="{{ route('cart') }}" >View more...</a>
            @break
        @endif
    @endforeach
    @else
        <h5 class="text-center font-weight-bold text-uppercase pt-4 mb-0">Cart is empty!</h5>
    @endif
</div>

<div class="cart-total">
    <label>Subtotal:</label>
    <span class="price">$ {{ $total }}</span>
</div>

<div class="cart-action">
    <a href="{{ route('cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
    <a href="{{ route('checkout') }}" class="btn btn-primary  btn-rounded">Checkout</a>
</div>
