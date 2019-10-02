<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doacao_boleto;
class Recibo extends Model
{
    
      protected $table = 'code_reference_payment';

      protected $fillable = [
            'cod_boleto','link_recibo', 'codigo_verificacao'
      ];

      protected $primaryKey = 'id';
    
      protected $guarded = [];
            
   
}
