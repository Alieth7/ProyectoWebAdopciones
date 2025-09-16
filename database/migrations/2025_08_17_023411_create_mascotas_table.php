<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *mejorado con index que es buena practica y esta personalizado
     *Schema::table('tu_tabla', function (Blueprint $table) {
     *$table->smallInteger('id_usuarios')->unsigned()->nullable();
     *$table->index('id_usuarios');  Buena práctica
     *$table->foreign('id_usuarios')->references('id')->on('usuarios')
     *->onDelete('cascade');*/

    public function up(): void
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->smallInteger('id',true,true);
            $table->string('nombre',30);
            $table->tinyInteger('edad');
            $table->string('color',35);
            $table->decimal('peso',4,1); /*4 digitos en TOTAL 3 enteros y 1 decimal 120.2 kilos*/
            $table->enum('tamanio',['pequeño','mediano','grande']);
            $table->boolean('esterilizado'); /*SE PUSO TINYINT(en MySql), en laravel esto es equivalente a booblean, y automaticamente devolvera un true o false por php*/
            $table->text('cuidado_especial')->nullable();
            $table->string('comportamiento')->nullable();
            $table->text('url_foto');
            $table->enum('estado',['disponible','no_disponible','en_tratamiento','en_proceso','adoptado']); /*corregir y quitar los _ */
            $table->tinyInteger('eliminado')->default(1);
            $table->timestamps();

            /* $table->enum('raza',['Mestizo','Siames','Persa','Bengali','Siberiano','']);
            de perros raza mestizo,labrador,golden retriever,pastor aleman,bulldog frances,poodle,beagle,chihuahua,cocker,dalmata,
            $table->enum('especie',['Gato','Perro']);*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
