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

            // Identificador
            $table->id();

            // Usuario propietario del anuncio
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | Información principal
            |--------------------------------------------------------------------------
            */

            $table->string('marca');
            $table->string('modelo');
            $table->integer('anio');

            /*
            |--------------------------------------------------------------------------
            | Características del vehículo
            |--------------------------------------------------------------------------
            */

            $table->integer('kilometros');

            $table->string('combustible');
            $table->string('transmision');

            $table->integer('potencia');      // CV
            $table->integer('cilindrada');    // cc

            $table->string('tipo_vehiculo');  // Berlina, SUV, Compacto...
            $table->string('color');

            $table->tinyInteger('puertas');
            $table->tinyInteger('plazas');

            /*
            |--------------------------------------------------------------------------
            | Información comercial
            |--------------------------------------------------------------------------
            */

            $table->decimal('precio', 10, 2);

            $table->string('estado')
                ->default('Disponible');

            /*
            |--------------------------------------------------------------------------
            | Localización
            |--------------------------------------------------------------------------
            */

            $table->string('provincia');
            $table->string('ciudad');

            /*
            |--------------------------------------------------------------------------
            | Información adicional
            |--------------------------------------------------------------------------
            */

            $table->text('descripcion')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Imagen principal
            |--------------------------------------------------------------------------
            */

            $table->string('foto_principal')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Fechas
            |--------------------------------------------------------------------------
            */

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
