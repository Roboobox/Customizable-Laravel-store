<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Auth::user();
        if ($user)
        {
            $user->password = Hash::make( $request->new_password );
            $user->save();
        }

        return redirect()->back()->with('password-success', 'Password updated.');
    }
}
