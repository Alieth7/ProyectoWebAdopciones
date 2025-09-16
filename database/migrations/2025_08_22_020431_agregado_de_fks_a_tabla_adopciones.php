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
        Schema::table('adopciones',function(Blueprint $table){
            /*agregando atributo o columna*/
            $table->smallInteger('id_usuario')->unsigned()->index();
            $table->smallInteger('id_mascota')->unsigned()->index();
            $table->smallInteger('id_periodo_prueba')->unsigned()->index();
            /*definiendo como fk*/
            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');
            $table->foreign('id_mascota')
                  ->references('id')
                  ->on('mascotas')
                  ->onDelete('cascade');
            $table->foreign('id_periodo_prueba')
                  ->references('id')
                  ->on('periodo_pruebas')
                  ->onDelete('cascade');

        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('adopciones',function(Blueprint $table){
        //
        $table->dropForeign(['id_usuario']);
        $table->dropForeign(['id_mascota']);
        $table->dropForeign(['id_periodo_prueba']);

        $table->dropColumn('id_usuario');
        $table->dropColumn('id_mascota');
        $table->dropColumn('id_periodo_prueba');
        });
    }
};
