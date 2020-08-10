<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class DadosGerais extends Model
{
    protected $table = "dados_gerais";

    protected $primaryKey = 'id';

    protected $fillable = [
    	'hashDenun','respGeral','respOcorrencia','respViolencia','respLesao','respAgressor','respFinalizar'
    ];
	protected $date 	= ['created_at','update_at'];

    /*Função que representa o relacionamento de um  para muitos*/
    public function respAgressor_dados(){
        return $this->belongsTo(respAgressor::class);
    }
    /*Função que representa o relacionamento de um  para muitos*/
    public function respGeral_dados(){
        return $this->belongsTo(respGeral::class);
    }
    /*Função que representa o relacionamento de um  para muitos*/
    public function respLesao_dados(){
        return $this->belongsTo(respLesao::class);
    }
    /*Função que representa o relacionamento de um  para muitos*/
    public function respOcorrencia_dados(){
        return $this->belongsTo(respOcorrencia::class);
    }
    /*Função que representa o relacionamento de um  para muitos*/
    public function respViolencia_dados(){
        return $this->belongsTo(respViolencia::class);
    }
    /*Função que representa o relacionamento de um  para muitos*/
    public function respFinal_dados(){
        return $this->belongsTo(respFinalizar::class);
    }
    /*Função que representa o relacionamento de um  para muitos*/
    public function respEncaminhar(){
        return $this->hasMany(respEncaminhar::class);
    }
}
