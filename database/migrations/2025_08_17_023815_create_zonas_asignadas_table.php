<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * zonas_asignadas, modificar el modelo Zona para usar esta tabla
     */
    public function up(): void
    {
        Schema::create('zonas_asignadas', function (Blueprint $table) {
            $table->smallInteger('id',true,true);
            $table->string('nombre_zona',45);
            $table->double('latitud_centro');
            $table->double('longitud_centro');
            $table->tinyInteger('radio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zonas_asignadas');
    }
};
