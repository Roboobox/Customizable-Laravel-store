<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * Handle social provider authentication request.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function provider(string $provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Handle google authentication redirect.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function googleRedirect()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate([
            'email' => $googleUser->getEmail(),
            'account_type_id' => 2
        ], [
            'name' => ($googleUser->user['given_name'] ?? NULL),
            'surname' => ($googleUser->user['family_name'] ?? NULL),
            'email_verified_at' => now(),
        ]);

        Auth::login($user);
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Handle facebook authentication redirect.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function facebookRedirect()
    {
        $facebookUser = Socialite::driver('facebook')->fields(['first_name', 'last_name', 'email'])->stateless()->user();

        $user = User::firstOrCreate([
            'email' => $facebookUser->getEmail(),
            'account_type_id' => 3
        ], [
            'name' => ($facebookUser->user['first_name'] ?? NULL),
            'surname' => ($facebookUser->user['last_name'] ?? NULL),
            'email_verified_at' => now(),
        ]);

        Auth::login($user);
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
