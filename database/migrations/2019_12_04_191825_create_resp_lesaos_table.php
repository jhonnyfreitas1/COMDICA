<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespLesaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resp_lesaos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('nature',['Contusão', 'Corte/Perfuração/Laceração', 'Entorse/Luxação', 'Fratura', 'Amputação', 'Traumatismo Dentário', 'Traumatismo Crâniano-Encefálico', 'Politraumatismo', 'Intoxicação', 'Queimadura', 'Outros']);
            $table->enum('bodyPart', ['Cabeça/Rosto', 'Pescoço', 'Boca/Dentes','Coluna/Medula', 'Tórax/Dorso', 'Abdomên', 'Quadril/Pelve', 'Membros Superiores', 'Membros Inferiores', 'Órgãos Genitais/Ãnus', 'Múltiplos Órgãos/Regiões']);
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
        Schema::dropIfExists('resp_lesaos');
    }
}
