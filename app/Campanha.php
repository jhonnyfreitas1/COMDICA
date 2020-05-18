<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\User;

class Campanha extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"campanhas";

    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'id';

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['titulo', 'desc'];

    public function user_id(){
        return $this->belongsTo(User::class);
    }

}
