<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class SocialProfile extends Model
{
    protected $guarded = [];

    // RELACIONES
    // Un perfil pertenece solo a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }
}
