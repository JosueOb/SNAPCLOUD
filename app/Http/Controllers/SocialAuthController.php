<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
Use App\User;
use App\SocialProfile;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    public function redirect($provider){
        // $provider obtiene el proveedor de los datos, es decir, que red social se esta ocupando
        // dd($provider);
        return Socialite::with($provider)->redirect();
    }

    public function callback($provider){
        // dd($provider);
        $userProvider = Socialite::driver($provider)->user();
        // dd($userProvider);
        //se verifica si ya existe el perfil social del usuario
        $userSocialProfile = $this->thereIsASocialProfile($userProvider);
        //en caso de que exista el perfil, se realiza login del usuario
        if($userSocialProfile !== null){
            //  auth()->login($userSocialProfile);
            Auth::login($userSocialProfile);
            return redirect('/home');
        }else{
            //caso contrario se verifca si el correo del perfil social existe
            $userVerifyEmail = User::where('email',$userProvider->email)->first();
            // dd($verifyEmail);
            //si el correo del perfil social no existe se lo registra al usuario
            if($userVerifyEmail == null){
                //se crea al usuario
                $userVerifyEmail = User::create([
                    'name' => $userProvider->name,
                    'email' => $userProvider->email,
                    'avatar' => $userProvider->avatar,
                    'password' => str_random(16),
                ]);
                $userVerifyEmail->markEmailAsVerified();
            }
            //en caso de que exista el correo, se le agrega a la cuenta del usuario un nuevo perfil social
            $pofile = SocialProfile::create([
                'social_id'=> $userProvider->id,
                'user_id' => $userVerifyEmail->id,
                'provider' => $provider
            ]);
            
            //se realiza un login del usuario que se acabde crear
            auth()->login($userVerifyEmail);
            return redirect('/home');
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
