<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('path');
            $table->string('name');
            $table->bigInteger('periodo_id')->unsigned();
            $table->foreign('periodo_id')->references('id')->on('periodos');
            $table->bigInteger('tipoliquidacion_id')->unsigned();
            $table->foreign('tipoliquidacion_id')->references('id')->on('tipo_liquidacions');
            $table->bigInteger('organismo_id')->unsigned();
            $table->foreign('organismo_id')->references('id')->on('organismos');
            $table->unsignedInteger('secuencia')->nullable();
            $table->boolean('status');
            $table->boolean('apply');
            $table->boolean('rectificar');
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
        Schema::dropIfExists('files');
    }
}
