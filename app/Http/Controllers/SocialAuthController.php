<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
Use App\User;
use App\SocialProfile;

class SocialAuthController extends Controller
{
    public function facebook(){
        return Socialite::with('facebook')->redirect();
    }
    public function facebookCallback(){
        $userFaceboock = Socialite::driver('facebook')->user();
        // dd($user);
        $user = User::create([
            'name' => $userFaceboock->name,
            'email' => $userFaceboock->email,
            'avatar' => $userFaceboock->avatar,
            'password' => str_random(16),
        ]);

        $pofile = SocialProfile::create([
            'social_id'=> $userFaceboock->id,
            'user_id' => $user->id,
        ]);

        //se realiza un login del usuario que se acabde crear
        auth()->login($user);
        return redirect('/home');

    }

    public function google(){
        return Socialite::with('Google')->redirect();
    }
    public function googleCallback(){
        $user = Socialite::driver('Google')->user();
        dd($user);
    }

}
