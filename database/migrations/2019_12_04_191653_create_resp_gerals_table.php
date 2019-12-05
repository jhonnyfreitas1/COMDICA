<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespGeralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resp_gerals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->enum('gender', ['F', 'M'])->nullable();
            $table->enum('ethnicity', ['Branco', 'Pardo', 'Negro', 'Indígena'])->nullable();
            $table->boolean('pregnant')->nullable();
            $table->string('responsible')->nullable();
            $table->enum('locality', ['Itapipiré', 'Bom Jesus'])->nullable();
            $table->string('street')->nullable();
            $table->string('complement')->nullable();
            $table->integer('residence')->nullable();
            $table->string('number')->nullable();
            $table->boolean('deficient')->nullable();
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
        Schema::dropIfExists('resp_gerals');
    }
}
