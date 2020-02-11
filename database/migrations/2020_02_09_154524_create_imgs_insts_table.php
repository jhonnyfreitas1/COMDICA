<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgsInstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgs_insts', function (Blueprint $table) {
            $table->Increments('img_id');
            $table->string('imagem_princ');
            $table->string('imagem_sec');
            $table->string('imagem_ter');
            $table->string('imagem_qua');
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
        Schema::dropIfExists('imgs_insts');
    }
}
