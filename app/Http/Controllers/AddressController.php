<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AddressController extends Controller
{
    public function index() {
        return view('account.addresses', ['addresses' => UserAddress::where('user_id', Auth()->id())->get()]);
    }

    public function create(Request $request) {
        $request->validate([
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'postcode' => 'required|max:255',
            'phone_number' => 'required|numeric|digits_between:1,31',
        ]);

        UserAddress::create([
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'postcode' => $request->input('postcode'),
            'mobile' => $request->input('phone_number'),
            'user_id' => Auth()->id(),
            'company_id' => config('company.id'),
        ]);

        return redirect()->back()->with('success', 'New address added!');
    }

    public function update(Request $request) {
        $request->validate([
            'id' => Rule::exists('user_addresses', 'id'),
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'postcode' => 'required|max:255',
            'phone_number' => 'required|numeric|digits_between:1,31',
        ]);

        $update = UserAddress::where('id', $request->input('id'))->where('user_id', Auth()->id())
            ->update([
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'country' => $request->input('country'),
                'postcode' => $request->input('postcode'),
                'mobile' => $request->input('phone_number'),
            ]);

        if ($update) {
            return redirect()->back()->with('success', 'Address updated!');
        }
        return redirect()->back()->with('general', 'Something went wrong! Try again later');
    }

    public function destroy(Request $request) {
        $request->validate(['id' => ['required', Rule::exists('user_addresses', 'id')]]);

        $destroy = UserAddress::where('id', $request->input('id'))->where('user_id', Auth()->id())->delete();

        if ($destroy) {
            return redirect()->back()->with('success', 'Address deleted!');
        }
        return redirect()->back()->with('general', 'Something went wrong! Try again later');
    }
}
