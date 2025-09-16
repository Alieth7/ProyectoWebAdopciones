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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->mediumInteger('id',true,true);
            $table->enum('estado',['enviada','leida']); /*cambiar y consultar sobre los estados en otra migracion*/
            $table->string('mensaje',150);
            $table->timestamp('update_at')->useCurrent(); /*modificar el modelo para no usar create_at/si se actualiza el estado*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
