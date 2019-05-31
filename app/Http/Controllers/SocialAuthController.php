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
        
        $userSocialProfile = $this->thereIsASocialProfile($userFaceboock);

        if($userSocialProfile !== null){
            auth()->login($userSocialProfile);
            return redirect('/home');
        }else{
            //se verifca si el correo del perfil social existe
            $verifyEmail = User::where('email',$userFaceboock->email)->first();
            if($verifyEmail !== null){
                dd('Coreo ya ocupado');
            }else{
                //se crea al usuario
                $user = User::create([
                    'name' => $userFaceboock->name,
                    'email' => $userFaceboock->email,
                    'avatar' => $userFaceboock->avatar,
                    'password' => str_random(16),
                ]);
        
                $pofile = SocialProfile::create([
                    'social_id'=> $userFaceboock->id,
                    'user_id' => $user->id,
                    'provider' => 'facebook'
                ]);
                //se registra al usuario y a su vez se marca que el correo ha sido verificado
                $user->markEmailAsVerified();
                //se realiza un login del usuario que se acabde crear
                auth()->login($user);
                return redirect('/home');
            }
        }
    }

    public function google(){
        return Socialite::with('Google')->redirect();
    }
    public function googleCallback(){
        $userGoogle = Socialite::driver('Google')->user();
        $userSocialProfile = $this->thereIsASocialProfile($userGoogle);

        if($userSocialProfile !== null){
            auth()->login($userSocialProfile);
            return redirect('/home');
        }else{
            //se verifca si el correo del perfil social existe
            $verifyEmail = User::where('email',$userGoogle->email)->first();
            if($verifyEmail !== null){
                dd('Coreo ya ocupado');
            }else{
                //se crea al usuario
                $user = User::create([
                    'name' => $userGoogle->name,
                    'email' => $userGoogle->email,
                    'avatar' => $userGoogle->avatar,
                    'password' => str_random(16),
                ]);
        
                $pofile = SocialProfile::create([
                    'social_id'=> $userGoogle->id,
                    'user_id' => $user->id,
                    'provider' => 'google'
                ]);
                //se registra al usuario y a su vez se marca que el correo ha sido verificado
                $user->markEmailAsVerified();
                //se realiza un login del usuario que se acabde crear
                auth()->login($user);
                return redirect('/home');
            }
        }

    }

    public function thereIsASocialProfile($userQuery){

        //Se verifica si el id del perfil social existe en la BDD
        $socialProfile = User::whereIn('id', function($query) use ($userQuery){
            $query->from('social_profiles')
            ->select('social_profiles.user_id')
            ->where('social_profiles.social_id', $userQuery->id);
        })->first();
        return $socialProfile;
    }

}
