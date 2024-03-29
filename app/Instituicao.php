<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Galeria_inst;
use App\User;

class Instituicao extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"instituicoes";

    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'id';

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['name', 'desc', 'telefone', 'endereco', 'email', 'site', 'user_id'];

	/*Função que representa o relacionamento de muitos para um*/
	 public function inst_gal(){
         return $this->hasMany(Galeria_inst::class);
    }
	/*Função que representa o relacionamento de muitos para um*/
	 public function inst_user(){
         return $this->belongsTo(User::class);
    }
}
