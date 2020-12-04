<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculoClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo_cliente', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('idvehiculo');
            $table->unsignedBigInteger('idcliente');

            $table->foreign('idvehiculo')->references('id')->on('vehiculos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idcliente')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('vehiculo_cliente');
    }
}
