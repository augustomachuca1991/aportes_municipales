<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaLaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_laborals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo')->unsigned()->nullable();
            $table->bigInteger('liquidacion_id')->unsigned();
            $table->foreign('liquidacion_id')->references('id')->on('liquidacions');
            $table->bigInteger('clase_id')->unsigned();
            $table->foreign('clase_id')->references('id')->on('clases');
            $table->bigInteger('estado_id')->unsigned()->nullable();
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->bigInteger('funcion_id')->unsigned()->nullable();
            $table->foreign('funcion_id')->references('id')->on('funcions');
            $table->string('cargo')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
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
        Schema::dropIfExists('historia_laborals');
    }
}
