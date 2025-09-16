<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot; 
/**solo si fuera a tener un soft delete el pivot*/

class MascotaVacuna extends Model
{
    use HasFactory;

    public $timestamps= false;

    /**PK -compuesta -personalizada */
    protected $primaryKey=['id_mascota','id_vacuna'];
    public $incrementing=false;
    protected $keyType='int';

     /**no id-create-update*/
    protected $table='mascotas_vacunas';
    protected $fillable=['id_mascota',
                         'id_vacuna',
                         'fecha_vacunado'];

    /**pivote con atributos propios*/
    public function mascotas():BelongsTo{
        return $this->belongsTo(Mascota::class,'id_mascota');
    }
    public function vacunas():BelongsTo{
        return $this->belongsTo(Vacuna::class,'id_vacuna');
    }
}
