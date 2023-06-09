<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganismosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organismos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo')->unsigned()->unique();
            $table->bigInteger('cuit')->unsigned()->unique();
            $table->bigInteger('jurisdiccion_id')->unsigned();
            $table->foreign('jurisdiccion_id')->references('id')->on('jurisdiccions');
            $table->string('organismo');

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
        Schema::dropIfExists('organismos');
    }
}
