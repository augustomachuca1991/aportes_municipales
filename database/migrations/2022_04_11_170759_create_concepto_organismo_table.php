<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptoOrganismoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepto_organismo', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo')->unsigned();

            $table->bigInteger('concepto_id')->unsigned();
            $table->foreign('concepto_id')->references('id')->on('conceptos');
            $table->bigInteger('organismo_id')->unsigned();
            $table->foreign('organismo_id')->references('id')->on('organismos');
            $table->softDeletes();
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
        Schema::dropIfExists('concepto_organismo');
    }
}
