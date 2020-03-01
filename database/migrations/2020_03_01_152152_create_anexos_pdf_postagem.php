<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnexosPdfPostagem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexos_pdf_postagem', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_pdf');
            $table->string('src_pdf');
            $table->unsignedBigInteger('id_post');
            $table->foreign('id_post')->references('id')->on('postagens')->onDelete('cascade');
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
        Schema::dropIfExists('anexos_pdf_postagem');
    }
}
