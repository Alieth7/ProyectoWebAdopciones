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
        Schema::table('periodo_pruebas', function (Blueprint $table) {
            //campos fk
            $table->smallInteger('id_observacion')->unsigned()->index();
            $table->smallInteger('id_solicitud')->unsigned()->index();
            $table->smallInteger('id_zona_asignada')->unsigned()->index();
            //definimos fks
            $table->foreign('id_observacion')
                  ->references('id')
                  ->on('observaciones')
                  ->onDelete('cascade');
            $table->foreign('id_solicitud')
                  ->references('id')
                  ->on('solicitudes')
                  ->onDelete('cascade');
            $table->foreign('id_zona_asignada')
                  ->references('id')
                  ->on('zonas_asignadas')
                  ->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{

        Schema::table('periodo_pruebas', function (Blueprint $table) {
            /**borra referencia*/
            $table->dropForeign(['id_observacion']);
            $table->dropForeign(['id_solicitud']);
            $table->dropForeign(['id_zona_asignada']);

            /**borra columna*/
            $table->dropColumn('id_observacion');
            $table->dropColumn('id_solicitud');
            $table->dropColumn('id_zona_asignada');
        });
    }
};
