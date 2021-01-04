<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos_servicios', function (Blueprint $table) {
            $table->unsignedBigInteger('servicios_id');
            $table->unsignedBigInteger('vehiculos_id');

            $table->foreign('servicios_id')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vehiculos_id')->references('id')->on('vehiculos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos_servicios');
    }
}
