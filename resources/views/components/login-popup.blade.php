<div class="login-popup">
    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
        <ul class="nav nav-tabs text-uppercase" role="tablist">
            <li class="nav-item">
                <a href="#sign-in" class="sign-in-link nav-link active">Sign In</a>
            </li>
            <li class="nav-item">
                <a href="#sign-up" class="sign-up-link nav-link">Sign Up</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="sign-in">
                <div class="success-feedback"></div>
                <form method="post">
                    <div class="form-group">
                        <label for="l_email">Your email address *</label>
                        <input type="text" class="form-control" name="username" id="l_email" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mb-0">
                        <label for="l_password">Password *</label>
                        <input type="password" class="form-control" name="password" id="l_password" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-checkbox" id="remember1" name="remember1" required="">
                        <label for="remember1">Remember me</label>
                        <a href="#">Last your password?</a>
                    </div>
                    <div class="invalid-feedback general"></div>
                    <a href="#" onclick="signIn()" class="btn btn-primary">Sign In</a>
                </form>
            </div>
            <div class="tab-pane" id="sign-up">
                <form method="post">
                    <div class="form-group email">
                        <label for="r_email">Your email address *</label>
                        <input type="text" class="form-control" name="email_1" id="r_email" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mb-5 password">
                        <label for="r_password">Password *</label>
                        <input type="password" class="form-control" name="password_1" id="r_password" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mb-5 c_password">
                        <label for="r_c_password">Confirm password *</label>
                        <input type="password" class="form-control" name="password_2" id="r_c_password" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <p>Your personal data will be used to support your experience
                        throughout this website, to manage access to your account,
                        and for other purposes described in our <a href="#" class="text-primary">privacy policy</a>.</p>
                    <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                        <input type="checkbox" class="custom-checkbox" id="remember" name="remember" required="">
                        <label for="remember" class="font-size-md">I agree to the <a  href="#" class="text-primary font-size-md">privacy policy</a></label>
                    </div>
                    <div class="invalid-feedback general"></div>
                    <a href="#" onclick="signUp()" class="btn btn-primary">Sign Up</a>
                </form>
            </div>
        </div>
    </div>
</div>
