<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class RespLesao extends Model
{
    protected $table = "resp_lesaos";
    
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nature','bodyPart'
    ];
	protected $date 	= ['created_at','update_at'];

    /*Função que representa o relacionamento de muitos para um*/
    public function dados_respLesao(){
        return $this->hasMany(DadosGerais::class);
    }

}
