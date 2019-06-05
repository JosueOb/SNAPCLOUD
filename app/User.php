<?php

namespace App;
use App\Notifications\{UserResetPassword, UserVerifyEmail};

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\SocialProfile;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;



class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar', 'state',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token){
        $this->notify(new UserResetPassword($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new UserVerifyEmail);
    }
    
    // RELACIONES
    // Un usuario puede tener varios social profiles
    public function socialProfiles(){
        return $this->HasMany(SocialProfile::class);
    }
}
