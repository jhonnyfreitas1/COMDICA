<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespViolenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resp_violencias', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('violence', ['Física', 'Psicológica/Mental', 'Tortura', 'Sexual', 'Tráfico de Seres Humanos', 'Financeira/Econômica', 'Negligência/Abandono', 'Trabalho Infantil', 'Intervenção Legal', 'Outros'])->nullable();
            $table->enum('agression', ['Força Corporal/Espancamento', 'Enforcamento', 'Objeto Contudente', 'Objeto Perfúro-Cortante', 'Objeto Susbtância/Objeto Quente', 'Envenenamento', 'Arma de Fogo', 'Ameaça', 'Outros'])->nullable();
            $table->enum('consOcurrence', ['Aborto', 'Gravidez', 'DST', 'Tentativa de Suicídio', 'Transtorno Mental', 'Transtorno Comportamental', 'Estresse Pós-Traumático', 'Outros'])->nullable();
            $table->enum('violenceType', ['Assédio Sexual', 'Atentado Violento ao Pudor', 'Estupro', 'Exploração Sexual', 'Outros'])->nullable();
            $table->boolean('penetration')->nullable();
            $table->enum('penetrationType', ['Anal', 'Vaginal', 'Oral'])->nullable();
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
        Schema::dropIfExists('resp_violencias');
    }
}
