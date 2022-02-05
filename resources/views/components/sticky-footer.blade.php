<div class="sticky-footer sticky-content fix-bottom">
    <a href="{{ route('home') }}" class="sticky-link active">
        <i class="w-icon-home"></i>
        <p>Home</p>
    </a>
    <a href="{{ route('products') }}" class="sticky-link">
        <i class="w-icon-category"></i>
        <p>Products</p>
    </a>
    <a href="{{ route('account') }}" class="sticky-link">
        <i class="w-icon-account"></i>
        <p>Account</p>
    </a>
    <a href="{{ route('cart') }}" class="sticky-link">
        <i class="w-icon-cart"></i>
        <p>Cart</p>
    </a>

    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="w-icon-search"></i>
            <p>Search</p>
        </a>
        <form id="sticky-footer-search" method="get" action="{{ route('products') }}" class="input-wrapper">
            <input type="text" class="form-control" name="s" value="{{ Request::input('s') }}" autocomplete="off" placeholder="Search" required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
    </div>
</div>
