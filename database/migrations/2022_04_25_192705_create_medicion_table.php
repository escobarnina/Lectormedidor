<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('direccion')->nullable();
            $table->string('referencia');
            $table->integer('consumo')->nullable();
            $table->integer('consumoReal')->nullable();
            $table->double('total', 8, 2)->nullable();
            $table->unsignedInteger('idMensualidad');
            $table->foreign('idMensualidad')->references('id')->on('mensualidad');

            // Aquí hacemos que las claves foráneas sean nullable
            $table->unsignedBigInteger('idAdministrador')->nullable();  // Permite valores nulos
            $table->foreign('idAdministrador')->references('id')->on('users')->onDelete('set null'); // Se establece en null si el registro de 'users' es eliminado

            $table->unsignedBigInteger('idColaborador')->nullable(); // Permite valores nulos
            $table->foreign('idColaborador')->references('id')->on('colaborador')->onDelete('set null'); // Se establece en null si el registro de 'colaborador' es eliminado

            $table->unsignedBigInteger('idCliente')->nullable(); // Permite valores nulos
            $table->foreign('idCliente')->references('id')->on('cliente')->onDelete('set null'); // Se establece en null si el registro de 'cliente' es eliminado

            $table->integer('estado');
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
        Schema::dropIfExists('medicion');
    }
};
