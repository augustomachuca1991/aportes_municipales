<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptoLiquidacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepto_liquidacion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo')->unsigned()->nullable();

            $table->bigInteger('concepto_id')->unsigned();
            $table->foreign('concepto_id')->references('id')->on('conceptos');
            $table->bigInteger('liquidacion_id')->unsigned();
            $table->foreign('liquidacion_id')->references('id')->on('liquidacions');

            $table->decimal('importe', 8, 2)->unsigned();
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
        Schema::dropIfExists('concepto_liquidacion');
    }
}
