<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class RespEncaminhar extends Model
{
    protected $table = "resp_encaminhar";

    protected $primaryKey = 'id';

    protected $fillable = [
    	'encOrgao','encStatus','dadosGerais_id'
    ];
	protected $date 	= ['created_at','update_at'];

    /*Função que representa o relacionamento de muitos para um*/
    public function dados_respEncaminhar(){
        return $this->BelongsTo(DadosGerais::class);
    }
}
