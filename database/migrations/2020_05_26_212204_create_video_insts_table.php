<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoInstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_insts', function (Blueprint $table) {
            $table->Increments('video_id');
            $table->string('nome');

            /** Chave Estrangeira do banco video_imgs*/
            $table->Integer('galeria_id')->unsigned();
            $table->foreign('galeria_id')->references('gal_id')->on('galeria_insts')->onDelete('cascade');

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
        Schema::dropIfExists('video_insts');
    }
}
