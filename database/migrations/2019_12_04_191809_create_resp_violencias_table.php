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
            $table->enum('violence', ['Física', 'PsicológicaMental', 'Tortura', 'Sexual', 'Tráfico', 'FinanceiraEconômica', 'NegligênciaAbandono', 'TrabalhoInfantil', 'IntervençãoLegal', 'Outros']);
            $table->enum('agression', ['Força Corporal/Espancamento', 'Enforcamento', 'Objeto Contudente', 'Objeto Perfúro-Cortante', 'Objeto Susbtância/Objeto Quente', 'Envenenamento', 'Arma de Fogo', 'Ameaça', 'Outros']);
            $table->enum('consOcurrence', ['Aborto', 'Gravidez', 'DST', 'Tentativa de Suicídio', 'Transtorno Mental', 'Transtorno Comportamental', 'Estresse Pós-Traumático', 'Outros']);
            $table->enum('violenceType', []);
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
