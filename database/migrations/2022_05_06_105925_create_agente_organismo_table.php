<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenteOrganismoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agente_organismo', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agente_id')->unsigned();
            $table->foreign('agente_id')->references('id')->on('agentes');
            $table->bigInteger('organismo_id')->unsigned();
            $table->foreign('organismo_id')->references('id')->on('organismos');
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
        Schema::dropIfExists('agente_organismo');
    }
}
