<x-layout body-class="my-account">

    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
    </x-slot>

    <x-slot name="main">
        <x-page-header>My account</x-page-header>

        <div class="page-content pt-2">
            <div class="container">
                <div class="tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        <li class="nav-item">
                            <a href="{{ route('account') }}" class="nav-link{{ Route::is('account') ? ' active' : '' }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('orders') }}" class="nav-link{{ Route::is('orders') ? ' active' : '' }}">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('downloads') }}" class="nav-link{{ Route::is('downloads') ? ' active' : '' }}">Downloads</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('addresses') }}" class="nav-link{{ Route::is('addresses') ? ' active' : '' }}">Addresses</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('account-details') }}" class="nav-link{{ Route::is('account-details') ? ' active' : '' }}">Account details</a>
                        </li>
                        <li class="link-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">Logout</a>
                            </form>
                        </li>
                    </ul>

                    <div class="tab-content mb-6">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('assets/vendor/jquery.count-to/jquery.count-to.min.js') }}"></script>
    </x-slot>

</x-layout>
