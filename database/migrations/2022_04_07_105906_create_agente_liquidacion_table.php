<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenteLiquidacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agente_liquidacion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo')->unsigned()->nullable();
            $table->bigInteger('agente_id')->unsigned();
            $table->foreign('agente_id')->references('id')->on('agentes');
            $table->bigInteger('liquidacion_id')->unsigned();
            $table->foreign('liquidacion_id')->references('id')->on('liquidacions');
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agente_liquidacion');
    }
}
