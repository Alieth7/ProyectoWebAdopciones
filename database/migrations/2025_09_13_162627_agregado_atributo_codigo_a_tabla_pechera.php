<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
      public function up()
    {
        Schema::table('pecheras', function (Blueprint $table) {
            /*Agregar la columna 'codigo' como varchar(20) sin la restricción unique por ahora*/
            $table->string('codigo', 20)->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('pecheras', function (Blueprint $table) {
            $table->dropColumn('codigo');
        });
    }


};
