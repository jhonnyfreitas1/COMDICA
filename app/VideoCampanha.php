<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\Campanha;

class VideoCampanha extends Model
{
    protected $table = "video_campanhas";

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome_video'
    ];

    protected $guarded = [
        'campanha_id'
    ];

    protected $date 	= ['created_at','update_at'];

    public function album_galeria(){
        return $this->belongsTo(Campanha::class);
    }
}
