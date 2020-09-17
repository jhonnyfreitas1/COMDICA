<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Postagens;
use App\Tipo_user;
use App\Resolucao;
use App\Ata;
use App\AlbumGaleria;
use App\Instituicao;

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
    /*Função que representa o relacionamento de um para muitos*/
    public function user_resolucao(){
        return $this->hasMany(Resolucao::class);
    }
    /*Função que representa o relacionamento de um para muitos*/
    public function user_ata(){
        return $this->hasMany(Ata::class);
    }
    /*Função que representa o relacionamento de um para muitos*/
    public function user_album(){
        return $this->hasMany(AlbumGaleria::class);
    }

    /*Função que representa o relacionamento de um para muitos*/
    public function user_instituicao(){
        return $this->hasMany(Instituicao::class);
    }

    /*Função que representa o relacionamento de muitos para um*/
    public function user_postagem(){
        return $this->hasMany(Postagens::class);
    }
}
