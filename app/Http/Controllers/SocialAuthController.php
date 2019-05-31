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

        //Se verifica si el usuario con esta red socal existe
        $existing = User::whereIn('id', function($query) use ($userFaceboock){
            $query->from('social_profiles')
            ->select('social_profiles.user_id')
            ->where('social_profiles.social_id', $userFaceboock->id);
        })->first();

        if($existing !== null){
            auth()->login($existing);
            
            return redirect('/home');
        }

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
        //se registra al usuario y a su vez se marca que el correo ha sido verificado
        $user->markEmailAsVerified();
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
