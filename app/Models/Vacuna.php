<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacuna extends Model
{
    use HasFactory;

    public $timestamps= false;

    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';

    protected $table='vacunas';
    protected $fillable=['nombre'];

    
    public function mascotas_vacunas():HasMany{
        return $this->hasMany(MascotaVacuna::class,'id_vacuna');
    }
    /* public function Mascota():BelongsToMany{
        return $this->belongsToMany(Mascota::class,'mascotas_vacunas','id_vacuna','id_mascota')
                    ->withPivot('fecha_vacunado');
    } relacion si N:M no tuviera pivote con atrib propios*/
}

