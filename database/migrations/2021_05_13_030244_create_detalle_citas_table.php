<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_citas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cita')->unsigned();
            $table->foreign('id_cita')->references('id')->on('citas');
            $table->integer('id_tarifa')->unsigned();
            $table->foreign('id_tarifa')->references('id')->on('tarifas');
            $table->decimal('subtotal',12,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_citas');
    }
}
