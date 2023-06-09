<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiquidacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidacions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('declaracionjurada_id')->unsigned();
            $table->foreign('declaracionjurada_id')->references('id')->on('declaracion_juradas');
            $table->decimal('bruto', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('basico', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('antiguedad', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('aporte_personal', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('haberes_con_aporte', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('remunerativo', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('bonificable', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('no_bonificable', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('no_remunerativo', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('adicionales', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('familiar', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('hijo', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('esposa', 8, 2)->unsigned()->nullable()->default(0);
            $table->decimal('descuento', 8, 2)->unsigned()->nullable()->default(0);
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
        Schema::dropIfExists('liquidacions');
    }
}
