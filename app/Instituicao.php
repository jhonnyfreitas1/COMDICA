<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Img_inst;

class Instituicao extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"instituicoes";

    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'id';

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['name', 'desc', 'telefone', 'endereco', 'email', 'site', 'inst_img'];

	/*Função que representa o relacionamento de muitos para um*/
	 public function inst_img(){
         return $this->hasMany(Img_inst::class);
     }	
}
