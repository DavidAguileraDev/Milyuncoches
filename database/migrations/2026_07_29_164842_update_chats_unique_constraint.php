<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chats', function (Blueprint $table) {

            // Eliminar el índice único antiguo
            $table->dropUnique('chats_user1_id_user2_id_unique');

            // Crear el nuevo
            $table->unique([
                'user1_id',
                'user2_id',
                'anuncio_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('chats', function (Blueprint $table) {

            $table->dropUnique('chats_user1_id_user2_id_anuncio_id_unique');

            $table->unique([
                'user1_id',
                'user2_id'
            ]);
        });
    }
};
