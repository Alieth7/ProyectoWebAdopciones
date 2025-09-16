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
        /**create para crear- table para modificar*/
        Schema::create('pechera_periodos',function(Blueprint $table){
            $table->smallInteger('id_pechera')->unsigned();
            $table->smallInteger('id_periodo')->unsigned();
            $table->timestamps();

            $table->primary(['id_pechera','id_periodo']);
            $table->index(['id_pechera','id_periodo']);

            $table->foreign('id_pechera')
                  ->references('id')
                  ->on('pecheras')
                  ->onDelete('cascade');
            $table->foreign('id_periodo')
                  ->references('id')
                  ->on('periodo_pruebas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('pechera_periodos');
    }
};


