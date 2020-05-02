<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\User;
use App\ImgAlbumGaleria;


class AlbumGaleria extends Model
{
    protected $table = "album_galerias";

    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo','descricao'
    ];

    protected $guarded = [
        'user_id'
    ];

    protected $date 	= ['created_at','update_at'];

    public function user_id(){
        return $this->belongsTo(User::class);
    }
    public function album_galeria(){
        return $this->hasMany(ImgAlbumGaleria::class);
    }
}
