<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Postagem;

class Anexos_Pdf_Postagem extends Model
{
    protected $table = "anexos_pdf_postagem";

    protected $primaryKey = 'id';
    
    public $timestamps = true;

    public $fillable = [
    	'nome_pdf','src_pdf'
    ];

    protected $guarded = [
    	 'id_post',
    ];	

	  public function id_post(){
         return $this->belongsTo(Postagem::class);
     }     

}
