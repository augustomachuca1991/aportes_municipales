<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtipocodigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtipocodigos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo')->unsigned();
            $table->string('descripcion')->nullable();
            $table->bigInteger('tipocodigo_id')->unsigned();
            $table->foreign('tipocodigo_id')->references('id')->on('tipocodigos');

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
        Schema::dropIfExists('subtipocodigos');
    }
}
