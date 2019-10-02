<?php

namespace App;
use App\Recibo;
use App\Doacao_carne;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Doacao_boleto extends Model
{
    protected $table = "doacao_boleto";

    protected $primaryKey = 'id';
    
    public $timestamps = true;

    public $fillable = [
    	'status','doador_nome','doador_email','code',
    ];
    protected $guarded = [
    	 'valor_total','metodo_pagamento','cod_barra','fk_id_carne',
    ];	

	  public function fk_id_carne(){
         return $this->belongsTo(Doacao_carne::class);
     }     
    
}
