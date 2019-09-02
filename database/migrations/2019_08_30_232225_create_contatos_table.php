<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario_mensagem');
            $table->string('usuario_nome');
            $table->string('usuario_email')->nullable();
            $table->string('usuario_telefone')->nullable();
            $table->boolean('visto')->default(false);
            $table->enum('contato_assunto', ['reclamacao','duvida','sugestao']);
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
        Schema::dropIfExists('contatos');
    }
}
