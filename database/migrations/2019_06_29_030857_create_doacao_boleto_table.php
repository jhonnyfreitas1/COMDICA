<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoacaoBoletoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doacao_boleto', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> string('valor_parcelado')->nullable();
            $table -> string('doador_nome');
            $table -> string('doador_cpf');
            $table -> string('doador_email');
            $table -> Integer('code');
            $table -> string('link');
            $table -> string('valor_total');
            $table -> Integer('parcelas')->default('1');
            $table->enum('metodo_pagamento', ['boleto','carne']);
            $table -> string('vencimento');
            $table -> string('cod_barra');
             $table->string('data_pagamento')->nullable();
            $table -> string('status');
            $table->timestamps();
            $table->Integer('fk_id_carne')->nullable();
            $table->foreign('fk_id_carne')->references('carne_id')->on('doacao_carne')->onDelete('cascade')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doacao_boleto');
    }
}
