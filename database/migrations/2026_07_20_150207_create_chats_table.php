<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('chats', function (Blueprint $table) {

            // Añadir anuncio_id (nullable para no romper los chats existentes)
            $table->foreignId('anuncio_id')
                ->nullable()
                ->after('id')
                ->constrained('anuncios')
                ->cascadeOnDelete();

            // Eliminar el índice antiguo
            $table->dropUnique('chats_user1_id_user2_id_unique');

            // Crear el nuevo índice
            $table->unique([
                'user1_id',
                'user2_id',
                'anuncio_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chats', function (Blueprint $table) {

            $table->dropUnique('chats_user1_id_user2_id_anuncio_id_unique');

            $table->dropConstrainedForeignId('anuncio_id');

            $table->unique([
                'user1_id',
                'user2_id'
            ]);
        });
    }
};
