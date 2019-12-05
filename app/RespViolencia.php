<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class RespViolencia extends Model
{
    protected $table = "resp_violencias";
    
    protected $primaryKey = 'id';

    protected $fillable = [
    	'violence','agression','consOcurrence','violenceType','penetration','penetrationType'
    ];
	protected $date 	= ['created_at','update_at'];

    /*Função que representa o relacionamento de muitos para um*/
     public function dados_respViolencia(){
        return $this->hasMany(DadosGerais::class);
    }

}
