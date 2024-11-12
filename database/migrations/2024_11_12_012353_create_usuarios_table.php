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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id');
            $table->string('usuario', 50);
            $table->string('primerNombre', 50);
            $table->string('segundoNombre', 50);
            $table->string('primerApellido', 50);
            $table->string('segundoApellido', 50);
            $table->string('email', 50);
            $table->bigInteger('idDepartamento');
            $table->bigInteger('idCargo');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->foreign('idDepartamento')->references('id')->on('departamentos');
            $table->foreign('idCargo')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
