<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Img_inst;
use App\Instituicao;

class Galeria_inst extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"galeria_insts";

    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'gal_id';

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['img1', 'img2', 'instituicao_id'];

	/*Função que representa o relacionamento de muitos para um*/
	 public function galeria_insts(){
         return $this->belongsTo(Instituicao::class);
    }
	/*Função que representa o relacionamento de muitos para um*/
	 public function galeria_img(){
         return $this->hasMany(Img_inst::class);
    }
}
