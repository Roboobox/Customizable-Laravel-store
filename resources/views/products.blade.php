<x-layout body-class="products">
    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
    </x-slot>

    <x-slot name="main">

        <div class="page-content">
            <div class="container">

                <div class="shop-content-container mt-lg-10 mt-5 p-relative">
                    <div class="loading-overlay"><div class="spinner loading"></div> </div>
                    <div class="shop-content row gutter-lg mb-10" {{ request()->route('category') ? 'data-category=' . request()->route('category')->slug : '' }} data-url="{{ route('ajax-products') }}">
                    </div>
                </div>
            </div>
        </div>

    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('assets/vendor/sticky/sticky.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/nouislider/nouislider.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/zoom/jquery.zoom.js') }}"></script>
        <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom/products.js?v=1') }}"></script>
    </x-slot>

</x-layout>
