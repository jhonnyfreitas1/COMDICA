<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicoes', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('visao');
            $table->string('valor');
            $table->string('missao');

            /** Chave Estrangeira do banco insts_imgs*/          
            $table->Integer('inst_img')->unsigned();
            $table->foreign('inst_img')->references('img_id')->on('imgs_insts')->onDelete('cascade');

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
        Schema::dropIfExists('instituicoes');
    }
}
