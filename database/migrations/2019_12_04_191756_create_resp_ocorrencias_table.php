<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resp_ocorrencias', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('occurrence',['Residencia', 'Habitação Coletiva', 'Escola', 'Local de Prática Esportiva', 'Bar/Similar', 'Via Pública', 'Comércio/Serviços', 'Indústria/Construção', 'Outros'])->nullable();
            $table->boolean('otherOcurrence')->nullable();
            $table->boolean('autoProvocated')->nullable();
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
        Schema::dropIfExists('resp_ocorrencias');
    }
}
