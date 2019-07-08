<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoacaoCarneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doacao_carne', function (Blueprint $table) {
            $table->Integer('carne_id');
            $table->primary('carne_id');
            $table->Integer('valor_parcelado')->nullable();
            $table -> string('doador_nome');
            $table -> string('link_carne');
            $table -> Integer('valor_total');
            $table -> Integer('numero_parcelas');
            $table  -> Integer('parcelas_pagas')->nullable();      
            $table -> string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doacao_carne');
    }
}
