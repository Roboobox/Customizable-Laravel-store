<!DOCTYPE html>
<html lang="en">

<x-head>
    <x-slot name="customCss">
        {{ $customCss }}
    </x-slot>
</x-head>

<body class="{{ $bodyClass }}">
    <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1>
    <div class="page-wrapper">
        <x-header></x-header>

        <main class="main">
            {{ $main }}
        </main>

        <x-footer></x-footer>
    </div>

    <x-sticky-footer></x-sticky-footer>
    <x-scroll-top></x-scroll-top>
    <x-mobile-menu></x-mobile-menu>
    <x-newsletter-popup></x-newsletter-popup>
    <x-quick-view></x-quick-view>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.min.js') }}"></script>

    {{ $scripts }}

</body>
