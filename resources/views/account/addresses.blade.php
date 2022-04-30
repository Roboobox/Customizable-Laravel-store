<x-account-layout>
    <div class="tab-pane active" id="account-addresses">
        <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
            <div class="icon-box-content">
                <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
            </div>
        </div>
        <p>The following addresses will be used on the checkout page</p>
        @if(session('success'))
            <div class="alert alert-success alert-simple alert-inline show-code-action mt-2 mb-3">
                {{ session('success') }}
            </div>
        @elseif(session('general'))
            <div class="alert alert-error alert-simple alert-inline show-code-action mt-2 mb-3">
                {{ session('general') }}
            </div>
        @endif
        <button class="btn btn-link btn-underline btn-icon-right text-primary btn-add-address mb-4"
        data-url="{{ route('addresses-create') }}">
            <span style="vertical-align: middle" class="align-middle">Add new address</span>
            <i class=" font-weight-bold w-icon-plus"></i>
        </button>
        <div id="account_form_container" {{ $errors->any() ? '' : "style=display:none" }}>
            <div class="row">
                <div class="col-12">
                    <form class="form account-details-form mb-5" action="{{ route('addresses-create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" value="{{ old('address') }}" id="address" name="address" class="form-control form-control-md @error('address') invalid @enderror">
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-control form-control-md @error('city') invalid @enderror">
                                    @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" value="{{ old('country') }}" id="country" name="country" class="form-control form-control-md @error('country') invalid @enderror">
                                    @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcode">Postcode</label>
                                    <input type="text" id="postcode" name="postcode" value="{{ old('postcode') }}" class="form-control form-control-md @error('postcode') invalid @enderror">
                                    @error('postcode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone number</label>
                                    <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" class="form-control form-control-md @error('phone_number') invalid @enderror">
                                    @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="edit_id" value="">
                        <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-5 pl-5 pr-5">Save</button>
                        <button type="button" class="ml-4 btn btn-link btn-underline btn-icon-right text-primary btn-account-close">Close</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($addresses as $address)
                <div class="col-sm-6 mb-6">
                    <div class="ecommerce-address billing-address pr-lg-8">
                        <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address <span
                                data-id="{{ $address->id }}" style="display: none" class="ml-1 badge">Editing</span></h4>
                        <address class="mb-4">
                            <table class="address-table">
                                <tbody>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{ $address->address }}</td>
                                </tr>
                                <tr>
                                    <th>City:</th>
                                    <td>{{ $address->city }}</td>
                                </tr>
                                <tr>
                                    <th>Country:</th>
                                    <td>{{ $address->country }}</td>
                                </tr>
                                <tr>
                                    <th>Postcode:</th>
                                    <td>{{ $address->postcode }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $address->mobile }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </address>
                        <button
                            data-url="{{ route('addresses-edit') }}"
                            data-id="{{ $address->id }}" data-address="{{ $address->address }}"
                            data-city="{{ $address->city }}" data-country="{{ $address->country }}"
                            data-postcode="{{ $address->postcode }}" data-mobile="{{ $address->mobile }}"
                            class="btn btn-link btn-underline btn-icon-right text-primary btn-edit-address">Edit
                            your address<i class="w-icon-long-arrow-right"></i></button>
                        <br>
                        <form class="address-delete-form" action="{{ route('addresses-delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $address->id }}">
                            <button
                                type="submit"
                                class="btn btn-link btn-underline btn-icon-right text-danger pt-2 btn-delete-address">
                                Delete address</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-account-layout>
