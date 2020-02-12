<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;

class Tipo_user extends Model
{
 
      protected $table = 'tipos_users';

      protected $fillable = [
            'name'
      ];
      protected $primaryKey = 'id';



    /*Função que representa o relacionamento de muitos para um*/
    public function tipo_user(){
        return $this->BelongsTo(User::class);
    } 


}
