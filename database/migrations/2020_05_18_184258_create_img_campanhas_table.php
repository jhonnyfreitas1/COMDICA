<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_campanhas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_img');

            $table->unsignedInteger('campanha_id');
            $table->foreign('campanha_id')->references('id')->on('campanhas')->onDelete('cascade');

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
        Schema::dropIfExists('img_campanhas');
    }
}
