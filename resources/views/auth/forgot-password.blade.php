<x-layout body-class="verify-email">

    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
    </x-slot>

    <x-slot name="main">
        <x-page-header>My Account</x-page-header>
        <div class="page-content">
            <div class="container">
                <div class="popup-window">
                    <figure class="popup-window-icon text-center text-primary">
                        <i class="w-icon-return2"></i>
                    </figure>
                    <div class="popup-window-content">
                        <h3 class="font-weight-bolder text-center">Forgot your password?</h3>
                        <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                        <form class="text-center mb-4" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group mb-5">
                                <label class="d-block mb-1" for="email">{{ __('Your email address *') }}</label>
                                <input class="form-control" value="{{ old('email') }}" placeholder="example@domain.com" type="email" name="email" id="email" required autofocus>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-error alert-bg alert-block alert-inline">
                                    <h4 class="alert-title">
                                        <i class="w-icon-exclamation-triangle"></i>{{ __('Whoops! Something went wrong.') }}</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Session Status -->
                            @if (session()->has('status'))
                                <div class="mt-5 alert alert-success alert-simple alert-inline show-code-action">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="mt-5">
                                <button class="btn btn-primary" type="submit">{{ __('Email Password Reset Link') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="scripts"></x-slot>
</x-layout>
