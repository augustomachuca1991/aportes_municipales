<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclaracionJuradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declaracion_juradas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('file_id')->unsigned();
            $table->foreign('file_id')->references('id')->on('files');
            $table->bigInteger('periodo_id')->unsigned();
            $table->foreign('periodo_id')->references('id')->on('periodos');
            $table->bigInteger('tipoliquidacion_id')->unsigned();
            $table->foreign('tipoliquidacion_id')->references('id')->on('tipo_liquidacions');
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
        Schema::dropIfExists('declaracion_juradas');
    }
}
