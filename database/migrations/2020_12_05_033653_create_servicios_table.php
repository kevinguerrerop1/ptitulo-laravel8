<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('idtiposervicio');
           $table->unsignedBigInteger('idvehiculo');
           $table->unsignedBigInteger('idempleado');
           $table->string('descripcion');

           $table->foreign('idtiposervicio')->references('id')->on('tipo_servicios')->onUpdate('cascade')->onDelete('cascade');
           $table->foreign('idvehiculo')->references('id')->on('vehiculos')->onUpdate('cascade')->onDelete('cascade');
           $table->foreign('idempleado')->references('id')->on('empleados')->onUpdate('cascade')->onDelete('cascade');
            

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
        Schema::dropIfExists('servicios');
    }
    
}
