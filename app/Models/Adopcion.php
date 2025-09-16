<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Adopcion extends Model
{
    use HasFactory;

    /**PK personalizada*/
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';
    /**tinyint/smallint igual se manejan como int en Eloquent*/

    /**no id-create-update, campos permitidos para la insercion y/o manipulacion masiva*/
    protected $table='adopciones';
    protected $fillable=['observacion',
                         'id_usuaio',
                         'id_mascota',
                         'id_periodo_prueba'];

    /**relaciones cardinales*/
    public function usuarios():BelongsTo{
        return $this->belongsTo(Usuario::class,'id_usuario');
    }
    
    public function mascotas():HasOne{
        return $this->hasOne(Mascota::class,'id_mascota');
    }

    public function periodo_pruebas():HasOne{
        return $this->hasOne(PeriodoPrueba::class,'id_periodo_prueba');
    }
}
