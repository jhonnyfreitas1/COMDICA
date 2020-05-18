<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\Campanha;

class ImgCampanha extends Model
{
    protected $table = "img_campanhas";

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome_img'
    ];

    protected $guarded = [
        'campanha_id'
    ];

    protected $date 	= ['created_at','update_at'];

    public function album_galeria(){
        return $this->belongsTo(Campanha::class);
    }
}
