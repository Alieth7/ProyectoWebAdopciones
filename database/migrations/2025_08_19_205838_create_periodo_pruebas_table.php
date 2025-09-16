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
        Schema::create('periodo_pruebas', function (Blueprint $table) {
            $table->smallInteger('id',true,true);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado',['pendiente','activo','completado','cancelado']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodo_prubas');
    }
};
