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
        Schema::table('solicitudes', function (Blueprint $table) {
            //
            $table->smallInteger('id_usuario')->unsigned()->index();
            $table->smallInteger('id_mascota')->unsigned()->index();

            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');
            $table->foreign('id_mascota')
                  ->references('id')
                  ->on('mascotas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            //
            $table->dropForeign(['id_usuario']);
            $table->dropForeign(['id_mascota']);

            $table->dropColumn('id_usuario');
            $table->dropColumn('id_mascota');
        });
    }
};
