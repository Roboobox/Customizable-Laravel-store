<div class="login-popup">
    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
        <ul class="nav nav-tabs text-uppercase" role="tablist">
            <li class="nav-item">
                <a href="#sign-in" class="sign-in-link nav-link{{ (!session()->has('tab') || session('tab') === 'sign-in') ? ' active' : '' }}">Sign In</a>
            </li>
            <li class="nav-item">
                <a href="#sign-up" class="sign-up-link nav-link{{ session('tab') === 'sign-up' ? ' active' : '' }}">Sign Up</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane{{ (!session()->has('tab') || session('tab') === 'sign-in') ? ' active' : '' }}" id="sign-in">
                <div class="success-feedback"></div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="l_email">Your email address *</label>
                        <input class="form-control{{ $errors->has('email') ? ' invalid' : ''}}" value="{{ old('email') }}" type="email" name="email" id="l_email" required autofocus>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="l_password">Password *</label>
                        <input type="password" class="form-control{{ $errors->has('email') ? ' invalid' : ''}}" name="password" id="l_password" required autocomplete="current-password">
                    </div>
                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-checkbox" id="remember1" name="remember">
                        <label for="remember1">Remember me</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        @endif
                    </div>
                    <div class="invalid-feedback general"></div>
                    <button type="submit" class="w-100 btn btn-primary">Sign In</button>
                </form>
            </div>
            <div class="tab-pane{{ session('tab') === 'sign-up' ? ' active' : '' }}" id="sign-up">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group email">
                        <label for="r_email">Your email address *</label>
                        <input type="text" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' invalid' : ''}}" name="email" id="r_email" required autofocus>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-5 password">
                        <label for="r_password">Password *</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' invalid' : ''}}" name="password" id="r_password" required autocomplete="new-password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-5 c_password">
                        <label for="r_c_password">Confirm password *</label>
                        <input type="password" class="form-control" name="password_confirmation" id="r_c_password" required>
                    </div>
                    <p>Your personal data will be used to support your experience
                        throughout this website, to manage access to your account,
                        and for other purposes described in our <a href="#" class="text-primary">privacy policy</a>.</p>
                    <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                        <input type="checkbox" class="custom-checkbox" id="tos" name="tos" required>
                        <label for="tos" class="font-size-md">I agree to the <a  href="#" class="text-primary font-size-md">privacy policy</a></label>
                    </div>
                    @error('tos')
                        <div class="alert mb-5 alert-icon alert-error alert-bg alert-inline show-code-action">
                            <h4 class="alert-title"><i class="w-icon-times-circle"></i></h4> {{ $message }}
                        </div>
                    @enderror
                    <div class="invalid-feedback general"></div>
                    <button type="submit" class="w-100 btn btn-primary">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>
