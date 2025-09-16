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
        Schema::table('mascotas', function (Blueprint $table) {
            /**agregado de atributo fk*/
            $table->tinyInteger('id_raza')->unsigned()->index();
            /**definiendo como fk*/
            $table->foreign('id_raza')
                  ->references('id')
                  ->on('razas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mascotas', function (Blueprint $table) {
            //
            $table->dropForeign(['id_raza']);
            $table->dropColumn('id_raza'); 
        });
    }
};
