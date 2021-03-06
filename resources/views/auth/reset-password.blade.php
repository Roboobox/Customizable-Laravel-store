<x-layout body-class="verify-email">

    <x-slot name="customCss">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
    </x-slot>

    <x-slot name="main">
        <x-page-header>My Account</x-page-header>
        <div class="page-content">
            <div class="container">
                <div class="popup-window">
                    <div class="popup-window-content">
                        <h3 class="font-weight-bolder text-center">Reset password</h3>
                        <form class="text-center mb-4 mt-5" method="POST" action="{{ route('password.update') }}">
                        @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <!-- Email Address -->
                            <div class="form-group mb-5">
                                <label class="d-block mb-1 text-left" for="email">{{ __('Your email address *') }}</label>
                                <input class="form-control" value="{{ old('email', $request->email) }}" type="email" name="email" id="email" required autofocus>
                            </div>

                            <div class="form-group mb-5">
                                <label class="d-block mb-1 text-left" for="password">{{ __('Password') }}</label>
                                <input class="form-control" type="password" name="password" id="password" required>
                            </div>

                            <div class="form-group mb-5">
                                <label class="d-block mb-1 text-left" for="email">{{ __('Confirm password') }}</label>
                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
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
                                <button class="btn btn-primary" type="submit">{{ __('Reset password') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="scripts"></x-slot>
</x-layout>
