<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PeriodoPrueba extends Model
{
    use HasFactory;

     public $timestamps=false;

    /**pk personalizada */
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';

    protected $table='periodo_pruebas';
    protected $fillable=['fecha_inicio',
                         'fecha_fin',
                         'estado',
                         'id_observacion',
                         'id_solicitud',
                         'id_zona_asignada',
                         'id_pechera'];


    public function adopciones():BelongsTo{
        return $this->belongsTo(Adopcion::class,'id_periodo_prueba');
    }

    public function observaciones(): HasMany{
        return $this->hasMany(Observacion::class,'id_observacion');
    }

    public function solicitudes():BelongsTo{
        return $this->belongsTo(Solicitud::class,'id_solicitud');
    }

    public function zonas_asignadas():HasOne{
        return $this->hasOne(ZonaAsignada::class,'id_zona_asignada');
    }

    public function pecheras():BelongsToMany{
        return $this->belongsToMany(Pechera::class,'pechera_periodos','id_periodo','id_pechera')
                    ->withTimestamps();
    }
}
