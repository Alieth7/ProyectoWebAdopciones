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
        Schema::create('mascotas_vacunas', function (Blueprint $table) {
            /*Columnas de fk siendo pk compuesta con propios tipos*/
            $table->smallInteger('id_mascota')->unsigned(); 
            $table->tinyInteger('id_vacuna')->unsigned();
            /*indicamos la llave compuesta y su index manualmente*/
             /*solo en compuestas especificar el pk*/
            $table->primary(['id_mascota','id_vacuna']);
            $table->index(['id_mascota','id_vacuna']);/*rendimiento para consultas*/
            /*atributo propio*/
            $table->date('fecha_vacunado');
            /*fks*/
            $table->foreign('id_mascota')
                  ->references('id')
                  ->on('mascotas')
                  ->onDelete('cascade');
            
            $table->foreign('id_vacuna')
                  ->references('id')
                  ->on('vacunas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas_vacunas');
    }
};
