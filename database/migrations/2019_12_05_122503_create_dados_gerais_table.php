<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosGeraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_gerais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hashDenun')->nullable();

            /** Chave Estrangeira da tabela resp_gerals*/
            $table->Integer('respGeral')->unsigned();
            $table->foreign('respGeral')->references('id')->on('resp_gerals')->onDelete('cascade');
            /** Chave Estrangeira da tabela resp_ocorrencias*/
            $table->Integer('respOcorrencia')->unsigned();
            $table->foreign('respOcorrencia')->references('id')->on('resp_ocorrencias')->onDelete('cascade');
            /** Chave Estrangeira da tabela resp_violencias*/
            $table->Integer('respViolencia')->unsigned();
            $table->foreign('respViolencia')->references('id')->on('resp_violencias')->onDelete('cascade');
            /** Chave Estrangeira da tabela resp_lesaos*/
            $table->Integer('respLesao')->unsigned();
            $table->foreign('respLesao')->references('id')->on('resp_lesaos')->onDelete('cascade');
            /** Chave Estrangeira da tabela resp_agressors*/
            $table->Integer('respAgressor')->unsigned();
            $table->foreign('respAgressor')->references('id')->on('resp_agressors')->onDelete('cascade');
            /** Chave Estrangeira da tabela resp_agressors*/
            $table->Integer('respFinalizar')->unsigned();
            $table->foreign('respFinalizar')->references('id')->on('resp_finalizar')->onDelete('cascade');

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
        Schema::dropIfExists('dados_gerais');
    }
}
