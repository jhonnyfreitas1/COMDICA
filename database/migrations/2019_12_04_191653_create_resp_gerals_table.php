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
            $table->string('name');
            $table->enum('gender', ['F', 'M'])->nullable();
            $table->enum('ethnicity', ['Branco', 'Pardo', 'Negro', 'Indígena'])->nullable();
            $table->boolean('pregnant')->nullable()->default(false);
            $table->string('responsible');
            $table->enum('locality', ['Itapipiré', 'Bom Jesus']);
            $table->string('street');
            $table->string('complement');
            $table->integer('residence');
            $table->string('number');
            $table->boolean('deficient')->default(false);
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
