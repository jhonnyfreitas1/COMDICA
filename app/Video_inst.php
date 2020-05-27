<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\Instituicao;

class Video_inst extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"video_insts";

    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'video_id';

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['nome', 'galeria_id'];

	/*Função que representa o relacionamento de muitos para um*/
	 public function img_insts(){
         return $this->belongsTo(Instituicao::class);
     }}
