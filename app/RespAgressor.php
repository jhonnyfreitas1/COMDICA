<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class RespAgressor extends Model
{
    protected $table = "resp_agressors";

    protected $primaryKey = 'id';

    protected $fillable = [
    	'agressorName','agressorAge','agressorGender','agressorBond','alcool'
    ];
	protected $date 	= ['created_at','update_at'];

    /*Função que representa o relacionamento de muitos para um*/
    public function dados_respAgressor(){
        return $this->hasMany(DadosGerais::class);
    }
}
