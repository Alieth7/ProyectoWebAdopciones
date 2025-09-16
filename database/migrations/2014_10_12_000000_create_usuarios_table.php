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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->smallInteger('id',true,true);/*UN y AI, por defecto es PK por el AI*/
            $table->string('nombre_usuario',25);
            $table->string('email',50)->unique();
            $table->string('password',130); /*un SHA-512 ocupa 128 caracteres*/
            $table->enum('rol',['admin','coord','usuario'])->default('usuario');
            $table->string('nombres',50);
            $table->string('ap_paterno',50);
            $table->string('ap_materno',50)->nullable();
            $table->string('ci',15);
            $table->string('nro_celular',13);
            $table->char('sexo',1); 
            $table->string('direccion',120);
            $table->tinyInteger('eliminado')->default(1);
            $table->timestamps();

           
            /**en otro migrations las relaciones y referencias*/ 
        });
    }

    /**
     * Reverse the migrations.  
     * OJO SE DEBE MIGRAR PRIMERO LAS TABLAS QUE SON REFERENCIADAS 
     * PARA QUE LA TABLA QUE TENGA SU FK AL SER CREADA LA ENCUENTRE Y RELACIONE
     * SE PUEDE CREAR LAS TABLAS Y LUEGO EN OTRAS MIGRAICONES SUS REFECENCIAS FK
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        /*$table->dropForeign('id_rol'); EN OTRA MIGRACION*/
    }
};
