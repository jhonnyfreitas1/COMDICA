<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class RespGeral extends Model
{
    protected $table = "resp_gerals";
    
    protected $primaryKey = 'id';

    protected $fillable = [
    	'name','gender','ethnicity','pregnant','responsible','locality','street','complement','residence','number','deficient'
    ];
	protected $date 	= ['created_at','update_at'];

    /*Função que representa o relacionamento de muitos para um*/
     public function dados_respGeral(){
        return $this->hasMany(DadosGerais::class);
    }
}
