<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
/**importante para relaciones cardinales */
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mascota extends Model
{
    use HasFactory;

    /**Pk personalizada*/
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';

     /**no id-create-update*/
    protected $table='mascotas';
    protected $fillable=['nombre',
                         'edad',
                         'color',
                         'peso',
                         'tamanio',
                         'esterilizado',
                         'cuidado_especial',
                         'comportamiento',
                         'url_foto',
                         'estado',
                         'eliminado',
                         'id_raza'];
    
   /* relacion con vacunas   -    la otra tabla--nom de tabla pivote-nom fk de tabla actual-nom fk tabla externa
    public function vacunas():BelongsToMany{
    return $this->belongsToMany(Vacuna::class,'mascotas_vacunas','id_mascota','id_vacuna')
    ->withPivot('fecha_vacunado');}*/

    /**relacion N:M con pivote con atributos adicionales*/
    public function mascotas_vacunas():HasMany{
        return $this->hasMany(MascotaVacuna::class,'id_mascota'); /**fk que los relaciona*/ 
    }

    public function razas():BelongsTo{
        return $this->belongsTo(Raza::class,'id_raza')->withDefault(['nombre'=>'Sin raza']);
    }

    public function adopciones():BelongsTo{
         return $this->belongsTo(Adopcion::class,'id_mascota');
    } 
    
    public function solicitudes():HasMany{
         return $this->hasMany(Solicitud::class,'id_mascota');
    }
}

