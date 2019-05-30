<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialAuthController extends Controller
{
    public function facebook(){
        return Socialite::with('facebook')->redirect();
    }
    public function facebookCallback(){
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }

    public function google(){
        return Socialite::with('Google')->redirect();
    }
    public function googleCallback(){
        $user = Socialite::driver('Google')->user();
        dd($user);
    }

}
