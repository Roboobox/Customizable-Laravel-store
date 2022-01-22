<x-account-layout>
    <div class="tab-pane active" id="account-details">
        <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
            <div class="icon-box-content">
                <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
            </div>
        </div>
        <form class="form account-details-form mb-5" action="#" method="post">
            @if(session('details-success'))
                <div class="alert alert-success alert-simple alert-inline show-code-action mt-2 mb-3">
                    {{ session('details-success') }}
                </div>
            @endif
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">First name</label>
                        <input type="text" id="firstname" name="firstname"
                               class="form-control form-control-md{{ $errors->has('firstname') ? ' invalid' : ''}}">
                        @error('firstname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">Last name</label>
                        <input type="text" id="lastname" name="lastname"
                               class="form-control form-control-md{{ $errors->has('lastname') ? ' invalid' : ''}}">
                        @error('lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_number">Phone number</label>
                        <input type="tel" id="phone_number" name="phone_number"
                               class="form-control form-control-md{{ $errors->has('phone_number') ? ' invalid' : ''}}">
                        @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-5">Save Changes</button>
        </form>
        <form class="form account-details-form" action="{{ route('change-password') }}" method="POST">
            @csrf
            <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
            @if(session('password-success'))
                <div class="alert alert-success alert-simple alert-inline show-code-action mt-2 mb-3">
                    {{ session('password-success') }}
                </div>
            @endif
            <div class="form-group">
                <label class="text-dark" for="cur-password">Current Password</label>
                <input type="password" class="form-control form-control-md{{ $errors->has('current_password') ? ' invalid' : ''}}"
                       id="cur-password" name="current_password">
                @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="text-dark" for="new-password">New Password</label>
                <input type="password" class="form-control form-control-md{{ $errors->has('new_password') ? ' invalid' : ''}}"
                       id="new-password" name="new_password">
                @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-10">
                <label class="text-dark" for="conf-password">Confirm Password</label>
                <input type="password" class="form-control form-control-md"
                       id="conf-password" name="new_password_confirmation">
            </div>
            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
        </form>
    </div>
</x-account-layout>
