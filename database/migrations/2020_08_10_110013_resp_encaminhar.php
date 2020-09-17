<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RespEncaminhar extends Migration
{
    public function up()
    {
        Schema::create('resp_encaminhar', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('encOrgao');
            $table->string('encStatus')->default('encaminhada');
            $table->longText('encDesc')->nullable();
            /** Chave Estrangeira da tabela dadosGerais_id*/
            $table->Integer('dadosGerais_id')->unsigned();
            $table->foreign('dadosGerais_id')->references('id')->on('dados_gerais')->onDelete('cascade');
            /** Chave Estrangeira da tabela encOrgao*/
            $table->Integer('encOrgao')->unsigned();
            $table->foreign('encOrgao')->references('id')->on('tipos_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resp_encaminhar');
    }
}
