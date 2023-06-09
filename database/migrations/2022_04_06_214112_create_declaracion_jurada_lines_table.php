<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclaracionJuradaLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declaracion_jurada_lines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('declaracionjurada_id')->unsigned();
            $table->foreign('declaracionjurada_id')->references('id')->on('declaracion_juradas');
            $table->string('nombre');
            $table->bigInteger('cuil')->unsigned();
            $table->date('fecha_nac');
            $table->string('sexo');
            $table->bigInteger('cod_estado_civil')->unsigned();
            $table->bigInteger('puesto_laboral')->unsigned()->nullable();
            $table->string('cargo')->nullable();
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso')->nullable();
            $table->bigInteger('nl_desde_nro')->unsigned()->nullable();
            $table->bigInteger('nl_hasta_nro')->unsigned()->nullable();
            $table->bigInteger('nl_desde_anio')->unsigned()->nullable();
            $table->bigInteger('nl_hasta_anio')->unsigned()->nullable();
            $table->string('nl_desde_otro')->nullable();
            $table->string('nl_hasta_otro')->nullable();
            $table->bigInteger('cod_categoria')->unsigned();
            $table->string('categoria');
            $table->bigInteger('cod_clase')->unsigned();
            $table->string('clase');
            $table->bigInteger('cod_estado')->unsigned();
            //$table->string('estado');
            // $table->bigInteger('cod_jurisdiccion')->unsigned();
            // $table->string('jurisdiccion');
            $table->bigInteger('cod_organismo')->unsigned();
            $table->bigInteger('cuit_organismo')->unsigned();
            $table->text('detalle');
            // $table->bigInteger('cod_funcion')->unsigned()->nullable();
            // $table->string('funcion')->nullable();
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
        Schema::dropIfExists('declaracion_jurada_lines');
    }
}
