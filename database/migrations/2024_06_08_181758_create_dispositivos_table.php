<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
	        $table->string('modelo');
            $table->string('noserie');
            $table->string('imei');
            $table->string('comentarios')->nullable();

            //$table->bigInteger('sensor_id')->unsigned()->nullable();
            //$table->bigInteger('linea_id')->unsigned();
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('vehiculo_id')->unsigned();

           // $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('linea_id')->references('id')->on('lineas')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos');
    }
};
