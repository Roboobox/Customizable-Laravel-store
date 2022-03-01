<x-layout body-class="login-page">

    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
    </x-slot>

    <x-slot name="main">
        <x-page-header>My Account</x-page-header>

        <div class="page-content">
            <div class="container">
                <x-login-popup></x-login-popup>
            </div>
        </div>

    </x-slot>

    <x-slot name="scripts">
    </x-slot>

</x-layout>
