<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
       	protected $fillable = [
       		'usuario_mensagem','contato_assunto','usuario_nome','usuario_email','usuario_telefone',
       	];
		public $timestamps = true;
}
