<x-layout body-class="home">

    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo1.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
    </x-slot>

    <x-slot name="main">
        <x-intro-section></x-intro-section>

        <div class="container">
            <x-benefit-banner></x-benefit-banner>
            <x-deal-banner></x-deal-banner>
        </div>

        <x-top-categories-banner></x-top-categories-banner>

        <div class="container">
            <x-clients-banner></x-clients-banner>
            <x-recent-views-banner></x-recent-views-banner>
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
