<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgAlbumGaleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_album_galerias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');

            $table->unsignedInteger('album_id');
            $table->foreign('album_id')->references('id')->on('album_galerias')->onDelete('cascade');

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
        Schema::dropIfExists('img_album_galerias');
    }
}
