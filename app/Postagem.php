<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\Relations\belongsTo;
class Postagem extends Model
{
      public $timestamps = true;
      
      protected $table = 'postagens';

      protected $fillable = [
            'titulo','descricao','imagem_principal','link_yt','pdf1','pdf2','categoria'
      ];
    
      protected $guarded = [
            'user_id',
      ];

      public function user_id(){
      	return $this->belongsTo(User::class);
      }

 }