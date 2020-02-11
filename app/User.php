<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Postagens;
use App\Tipo_user;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'tipo_user'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    /*Função que representa o relacionamento de um para muitos*/
    public function user_tipo(){
        return $this->hasMany(Tipo_user::class);
    } 

    /*Função que representa o relacionamento de muitos para um*/
    public function id(){
        return $this->BelongsTo(Postagens::class);
    }
}
