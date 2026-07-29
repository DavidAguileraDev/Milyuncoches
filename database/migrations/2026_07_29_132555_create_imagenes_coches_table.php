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
        Schema::create('imagenes_coches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('anuncio_id')
                ->constrained('anuncios')
                ->onDelete('cascade');

            // Ruta completa o relativa de la imagen
            $table->string('ruta');

            // Orden en el que se mostrarán las imágenes
            $table->unsignedInteger('orden')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes_coches');
    }
};