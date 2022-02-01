@if(!empty($cartItems))
@foreach($cartItems as $cartItem)
    <tr>
        <td class="product-thumbnail">
            <div class="p-relative">
                <a href="{{ route('product', ['product' => $cartItem->product->slug]) }}">
                    <figure>
                        <img src="{{ asset('assets/images/store/products/' . $cartItem->product->thumbnail->photo_path) }}" alt="product"
                             width="300" height="338">
                    </figure>
                </a>
                <button type="submit" class="btn btn-close remove-cart-item" data-url="{{ route('cart-remove', ['product' => $cartItem->product->id]) }}"><i class="fas fa-times"></i></button>
            </div>
        </td>
        <td class="product-name">
            <a href="{{ route('product', ['product' => $cartItem->product->slug]) }}">
                {{ $cartItem->product->name }}
            </a>
        </td>
        <td class="product-price"><span class="amount">${{ $cartItem->product->price }}</span></td>
        <td class="product-quantity">
            <form action="{{ route('cart-update', ['product' => $cartItem->product->id]) }}" method="POST">
                @csrf
                <div class="input-group">
                    <input name="quantity" class="quantity form-control" value="{{ $cartItem->quantity }}" type="number" min="1" max="100000">
                    <button type="button" class="quantity-change quantity-plus w-icon-plus"></button>
                    <button type="button" class="quantity-change quantity-minus w-icon-minus"></button>
                </div>
            </form>
        </td>
        <td class="product-subtotal">
            <span class="amount">${{ $cartItem->product->getSubtotal($cartItem->quantity) }}</span>
        </td>
    </tr>
@endforeach
@else
<tr><td colspan="5" class="text-center font-weight-bold text-uppercase">Cart is empty!</td></tr>
@endif
