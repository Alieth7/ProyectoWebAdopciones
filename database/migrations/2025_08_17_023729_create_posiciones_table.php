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
        Schema::create('posiciones', function (Blueprint $table) {
            $table->integer('id',true,true); /*verificar si esta bien el tipo*/
            $table->double('latitud',10,8);  /*-37.72938476   Va desde -90.00000000 hasta +90.00000000*/
            $table->double('longitud',11,8); /*-83,92840274  Va desde -180.00000000 hasta +180.00000000*/
            $table->timestamp('create_at')->useCurrent(); /*solo usa create_at, no se actualiza*/
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posiciones');
    }
};
