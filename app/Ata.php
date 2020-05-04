<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\User;

class Ata extends Model
{

    protected $table = "atas";

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome','mes', 'ano', 'tipo', 'created_at', 'updated_at'
    ];

    protected $guarded = [
        'user_id'
    ];

    protected $date 	= ['created_at','update_at'];


    // public function isOrdinaria(){
    //     return $this->tipo()->where('name', 'Administrator');
    // }

    // public function isExtraordinaria(){
    //     return $this->tipo = 'extraordinaria';
    // }


    public function user_id(){
        return $this->belongsTo(User::class);
    }
}
