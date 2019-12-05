<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespAgressorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resp_agressors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agressorNumber')->nullable();
            $table->enum('agressorGender', ['Masculino', 'Feminino', 'Ambos os Sexos', 'Outros'])->nullable();
            $table->enum('parent', ['Pai', 'Mãe', 'Padrasto', 'Madrasta', 'Cônjuge', 'Ex-Cônjuge', 'Namorado(A)', 'Ex-Namorado(A)', 'Filho(A)', 'Irmão(A)', 'Amigos/Conhecidos', 'Desconhecidos', 'Cuidador(A)', 'Patrão/Chefe', 'Pessoa com Relação Instituicional', 'Policial/Agente', 'Própria Pessoa', 'Outros'])->nullable();
            $table->boolean('alcool')->nullable();
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
        Schema::dropIfExists('resp_agressors');
    }
}
