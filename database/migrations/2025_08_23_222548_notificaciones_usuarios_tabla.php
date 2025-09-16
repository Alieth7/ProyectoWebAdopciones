<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Stmt\Label;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notificaciones_usuarios',function(Blueprint $table){
            $table->smallInteger('id_usuario')->unsigned();
            $table->mediumInteger('id_notificacion')->unsigned();
            $table->timestamp('create_at')->useCurrent();

            $table->primary(['id_usuario','id_notificacion']);
            $table->index(['id_usuario','id_notificacion']);
            
            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');
            $table->foreign('id_notificacion')
                  ->references('id')
                  ->on('notificaciones')
                  ->onDelete('cascade');
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       /**esto borra TODO mas las fk*/
        Schema::dropIfExists('notificaciones_usuarios');
        /** solo en migracion que actualiza fk se debe especificar
          * Schema::table('posts', function (Blueprint $table) {
          *  Es buena práctica eliminar la clave foránea antes de la columna si se hace en migraciones separadas
          *  $table->dropForeign(['user_id']); -> Elimina la clave foránea 'user_id'
          *  $table->dropColumn('user_id');    -> Opcionalmente, borra la columna si no se necesita más
       */
    }
};
