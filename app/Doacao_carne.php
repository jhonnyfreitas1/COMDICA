<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Model;
use App\Doacao_boleto;
class Doacao_carne extends Model
{
    protected $table = "doacao_carne";
    
    protected $primaryKey = 'carne_id';

    protected $fillable = [
    	'doador_nome','link_carne',
    ];
    
    protected $guarded =[
    	'valor_total', 'parcelas_pagas',
    ];
 	public $timestamps = true;

     public function carne_id(){
        return $this->hasMany(Doacao_boleto::class);
    }

}