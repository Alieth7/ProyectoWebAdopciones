<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('pecheras', function (Blueprint $table) {
        /* agregar la restriccion unique a la columna 'codigo'*/
        $table->unique('codigo');
    });
}

public function down()
{
    Schema::table('pecheras', function (Blueprint $table) {
        //
        $table->dropUnique(['codigo']);
    });
}

};
