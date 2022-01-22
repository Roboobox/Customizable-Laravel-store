<x-account-layout>
    <div class="tab-pane active" id="account-dashboard">
        <p class="greeting">
            Hello
            @if(Auth::user()->name && Auth::user()->surname)
                <span class="text-dark font-weight-bold">{{ Auth::user()->name . " " . Auth::user()->surname }}</span>
            @elseif(Auth::user()->email)
                <span class="text-dark font-weight-bold">{{ Auth::user()->email}}</span>
            @endif
        </p>

        <p class="mb-4">
            From your account dashboard you can view your <a href="{{ route('orders') }}"
                                                             class="text-primary link-to-tab">recent orders</a>,
            manage your <a href="{{ route('addresses') }}" class="text-primary link-to-tab">shipping
                and billing
                addresses</a>, and
            <a href="{{ route('account-details') }}" class="text-primary link-to-tab">edit your password and
                account details.</a>
        </p>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                <a href="{{ route('orders') }}" class="link-to-tab">
                    <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                        <div class="icon-box-content">
                            <p class="text-uppercase mb-0">Orders</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                <a href="{{ route('downloads') }}" class="link-to-tab">
                    <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-download">
                                                    <i class="w-icon-download"></i>
                                                </span>
                        <div class="icon-box-content">
                            <p class="text-uppercase mb-0">Downloads</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                <a href="{{ route('addresses') }}" class="link-to-tab">
                    <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-address">
                                                    <i class="w-icon-map-marker"></i>
                                                </span>
                        <div class="icon-box-content">
                            <p class="text-uppercase mb-0">Addresses</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                <a href="{{ route('account-details') }}" class="link-to-tab">
                    <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                        <div class="icon-box-content">
                            <p class="text-uppercase mb-0">Account Details</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        <div class="icon-box text-center">
                                                    <span class="icon-box-icon icon-logout">
                                                        <i class="w-icon-logout"></i>
                                                    </span>
                            <div class="icon-box-content">
                                <p class="text-uppercase mb-0">Logout</p>
                            </div>
                        </div>
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-account-layout>
