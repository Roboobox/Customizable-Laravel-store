<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountDetailController extends Controller
{
    public function create()
    {
        return view('account.account-details');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['nullable', 'max:255'],
            'lastname' => ['nullable', 'max:255'],
            'phone_number' => ['nullable', 'numeric', 'digits_between:0,31']
        ]);

        $user = Auth::user();
        if ($user)
        {
            $user->name = $request->firstname;
            $user->surname = $request->lastname;
            $user->mobile = $request->phone_number;
            $user->save();
        }

        return redirect()->route('account-details')->with('details-success', 'Account details updated.');
    }
}
