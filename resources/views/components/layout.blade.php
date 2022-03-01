<!DOCTYPE html>
<html lang="en">

<x-head>
    <x-slot name="customCss">
        {{ $customCss }}
    </x-slot>
</x-head>

<body class="{{ $bodyClass }}">
    <h1 class="d-none">Shop ABCD</h1>
    <div class="page-wrapper">
        <x-header :storeSettings="$storeSettings" :product-categories="$productCategories" :cart-item-count="$cartItemCount"></x-header>
        <main class="main">
            {{ $main }}
        </main>

        <x-footer :storeSettings="$storeSettings" :company="$company"></x-footer>
    </div>

    <x-sticky-footer></x-sticky-footer>
    <x-scroll-top></x-scroll-top>
    <x-mobile-menu :product-categories="$productCategories"></x-mobile-menu>
    <x-quick-view></x-quick-view>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js?v=1') }}"></script>
    <script src="{{ asset('assets/js/custom/custom.js?v=1') }}"></script>

    {{ $scripts }}

</body>
