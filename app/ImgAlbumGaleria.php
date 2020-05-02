<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\AlbumGaleria;

class ImgAlbumGaleria extends Model
{
    protected $table = "img_album_galerias";

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome'
    ];

    protected $guarded = [
        'album_id'
    ];
	protected $date 	= ['created_at','update_at'];

    public function album_galeria(){
        return $this->belongsTo(AlbumGaleria::class);
    }
}
