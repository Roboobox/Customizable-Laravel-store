<x-layout body-class="home">
    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo1.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
    </x-slot>

    <x-slot name="main">
        <x-intro-section :banner="$banner"></x-intro-section>

        @if(!empty($benefitBanners))
        <div class="container">
            <x-benefit-banner :benefit-banners="$benefitBanners"></x-benefit-banner>
        </div>
        @endif

        <x-top-categories-banner></x-top-categories-banner>

        <div class="container">
            @if(!empty($recentlyViewed))
                <x-recent-views-banner :recently-viewed="$recentlyViewed"></x-recent-views-banner>
            @endif
        </div>
    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/zoom/jquery.zoom.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/skrollr/skrollr.min.js') }}"></script>
    </x-slot>

</x-layout>
