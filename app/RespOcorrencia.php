<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class RespOcorrencia extends Model
{
    protected $table = "resp_ocorrencias";
    
    protected $primaryKey = 'id';

    protected $fillable = [
    	'occurrence','otherOcurrence','autoProvocated'
    ];
	protected $date 	= ['created_at','update_at'];

    /*Função que representa o relacionamento de muitos para um*/
     public function dados_respOcorrencia(){
        return $this->hasMany(DadosGerais::class);
    }

}
