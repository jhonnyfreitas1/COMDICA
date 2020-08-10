<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class RespFinalizar extends Model
{
    protected $table = "resp_finalizar";

    protected $primaryKey = 'id';

    protected $fillable = [
    	'finStatus'
    ];
	protected $date 	= ['created_at','update_at'];

    /*Função que representa o relacionamento de muitos para um*/
    public function dados_respFinal(){
        return $this->hasMany(DadosGerais::class);
    }
}
