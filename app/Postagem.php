<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\User;

class Postagem extends Model
{
      public $timestamps = true;

      protected $table = 'postagens';

      protected $fillable = [
            'titulo','descricao','imagem_principal','link_yt','pdf1','pdf2','categoria','arquivada'
      ];

      protected $guarded = [
            'user_id',
      ];

      public function user_id(){
      	return $this->belongsTo(User::class);
      }

 }
