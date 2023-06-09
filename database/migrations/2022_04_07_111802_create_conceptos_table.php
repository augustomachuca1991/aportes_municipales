<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo')->unsigned();
            $table->string('concepto');
            $table->string('unidad')->nullable();
            // $table->bigInteger('organismo_id')->unsigned();
            // $table->foreign('organismo_id')->references('id')->on('organismos');
            $table->bigInteger('subtipocodigo_id')->unsigned();
            $table->foreign('subtipocodigo_id')->references('id')->on('subtipocodigos');

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
        Schema::dropIfExists('conceptos');
    }
}
