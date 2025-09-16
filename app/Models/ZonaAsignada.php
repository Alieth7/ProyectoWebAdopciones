<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ZonaAsignada extends Model
{
    use HasFactory;

    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';

    protected $table='zonas_asignadas';
    protected $fillable=[   'nombre_zona',
                            'latitud_centro',
                            'longitud_centro',
                            'radio'];

   
    public function periodo_pruebas():BelongsToMany{
        return $this->belongsToMany(PeriodoPrueba::class,'id_zona_asignada');
    }
}
