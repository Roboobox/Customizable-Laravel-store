<nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb shop-breadcrumb bb-no">
            <li {{ Route::is('cart') ? "class=active" : '' }}><a href="{{ route('cart') }}">Shopping Cart</a></li>
            <li {{ Route::is('checkout') ? "class=active" : '' }}><a href="{{ route('checkout') }}">Checkout</a></li>
            <li {{ Route::is('order-complete') ? "class=active" : '' }}><a href="#">Order Complete</a></li>
        </ul>
    </div>
</nav>
