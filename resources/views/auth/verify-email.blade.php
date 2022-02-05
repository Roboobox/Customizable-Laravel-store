<x-layout body-class="verify-email">

    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
    </x-slot>

    <x-slot name="main">
        <x-page-header>My Account</x-page-header>
        <div class="page-content">
            <div class="container">
                <div class="verify-popup">
                    <figure class="verify-icon text-center text-primary">
                        <i class="w-icon-envelop"></i>
                    </figure>
                    <div class="verify-content">
                        <h3 class="font-weight-bolder text-center">Verify your email</h3>
                        <p>{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
                        <form class="text-center" method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <button class="btn btn-primary" type="submit">{{ __('Resend Verification Email') }}</button>
                            </div>
                        </form>
                        <form class="text-right mt-5" method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-link">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="scripts"></x-slot>
</x-layout>
