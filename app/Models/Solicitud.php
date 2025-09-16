<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Solicitud extends Model
{
    use HasFactory;

    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';

    protected $table='solicitudes';
    protected $fillable=['estado',
                         'razon',
                         'observaciones',
                         'id_usuario',
                         'íd_mascota'];


    public function usuarios():BelongsTo{
        return $this->belongsTo(Usuario::class,'id_usuario');
    }
    
    public function mascotas():BelongsTo{
        return $this->belongsTo(Mascota::class,'id_mascota');
    }
    
    public function periodo_pruebas():HasOne{
        return $this->hasOne(PeriodoPrueba::class,'id_solicitud');
    }
}
