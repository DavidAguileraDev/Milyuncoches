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
        Schema::create('anuncios', function (Blueprint $table) {

            // id
            $table->id();

            // Usuario que ha publicado el anuncio
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Datos del vehículo
            $table->string('marca');
            $table->string('modelo');
            $table->integer('anio');

            // Características
            $table->string('combustible');
            $table->string('transmision');

            // Precio
            $table->decimal('precio', 10, 2);

            // Descripción
            $table->text('descripcion')->nullable();

            //El tiempo que se ha creado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
