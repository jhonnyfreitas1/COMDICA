<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriaInstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_insts', function (Blueprint $table) {
            $table->Increments('gal_id');
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();

            /** Chave Estrangeira do banco insts_imgs*/
            $table->Integer('instituicao_id')->unsigned();
            $table->foreign('instituicao_id')->references('id')->on('instituicoes')->onDelete('cascade');

            $table->timestamps();        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeria_insts');
    }
}
