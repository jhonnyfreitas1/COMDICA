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
            'titulo','descricao','imagem_principal','link_yt','pdf1','pdf2','categoria','arquivada'
      ];

      protected $guarded = [
            'user_id',
      ];
      protected $rules = [
        'titulo'    => 'max:50 |unique:postagens,titulo',
        'imagem'    =>  'mimes:jpeg,jpg,png,bmp | required',
        'pdf0'      =>  'mimes:pdf ',
        'pdf1'      =>  'mimes:pdf ',
        'pdf2'      =>  'mimes:pdf ',
        'pdf3'      =>  'mimes:pdf ',
        'pdf4'      =>  'mimes:pdf ',
        'pdf5'      =>  'mimes:pdf ',
        'pdf6'      =>  'mimes:pdf ',
        'pdf7'      =>  'mimes:pdf ',
        'pdf8'      =>  'mimes:pdf ',
    ];
      public function user_id(){
      	return $this->belongsTo(User::class);
      }

 }
