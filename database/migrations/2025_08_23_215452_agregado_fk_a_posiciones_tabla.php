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
        Schema::table('posiciones', function (Blueprint $table) {
            //
            $table->smallInteger('id_pechera')->unsigned()->index();
            $table->foreign('id_pechera')
                  ->references('id')
                  ->on('pecheras')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posiciones', function (Blueprint $table) {
            //
            $table->dropForeign(['id_pechera']);
            $table->dropColumn('id_pechera');
        });
    }
};
