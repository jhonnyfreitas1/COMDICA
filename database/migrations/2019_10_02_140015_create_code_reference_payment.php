<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeReferencePayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_reference_payment', function (Blueprint $table) {
            $table->bigIncrements('id');        
            $table->string('link_recibo');
            $table->string('codigo_verificacao');
            $table->Integer('cod_boleto');
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
        Schema::dropIfExists('code_reference_payment');
    }
}
