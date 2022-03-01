<x-layout body-class="about-us">

    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
    </x-slot>

    <x-slot name="main">
        <x-page-header>About us</x-page-header>

        <div class="page-content">
            <div class="container">
                <section class="about-us-text mb-10 mt-10">
                    {!! $content->content !!}
                </section>
            </div>
        </div>
    </x-slot>

    <x-slot name="scripts">
    </x-slot>

</x-layout>
