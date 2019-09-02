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
            $table->bigIncrements('id');
            $table->Integer('valor_parcelado')->nullable();
            $table -> string('doador_nome');
            $table -> string('doador_cpf');
            $table -> string('doador_email');
            $table -> string('doador_telefone');
            $table -> Integer('charger_id');
            $table -> string('link_boleto');
            $table -> Integer('valor_total');
            $table -> Integer('quantidade');
            $table -> Integer('parcelas')->default('1');
            $table->enum('metodo_pagamento', ['boleto','carne']);
            $table -> date('vencimento'); 
            $table -> string('cod_barra');
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
