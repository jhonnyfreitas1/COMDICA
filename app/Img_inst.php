<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Instituicao;
class Img_inst extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"imgs_insts";

    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'img_id';

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['imagem_princ', 'imagem_sec', 'imagem_ter'];

	/*Função que representa o relacionamento de muitos para um*/
	 public function img_insts(){
         return $this->BelongsTo(Instituicao::class);
     }	

}
