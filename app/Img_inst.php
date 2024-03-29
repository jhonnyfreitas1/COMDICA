<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\Galeria_inst;
class Img_inst extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"imgs_insts";

    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'img_id';

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['nome', 'galeria_id'];

	/*Função que representa o relacionamento de muitos para um*/
	 public function img_galeria(){
         return $this->belongsTo(Galeria_inst::class);
     }

}
