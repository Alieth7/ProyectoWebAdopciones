<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
 
class Pechera extends Model
{
    use HasFactory;

    /**pk personalizada*/
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';


    protected $table='pecheras';
    protected $fillable=['codigo','estado'];

    public function getEstadoFormattedAttribute(){
        $map =['disponible' => 'Disponible',
                'asignada' => 'Asignada',
                'en_reparacion' => 'En reparacion'];
        return $map[$this->estado];
    }

    
    public function periodo_pruebas():BelongsToMany{
        return $this->belongsToMany(PeriodoPrueba::class,'pechera_periodos','id_pechera','id_periodo')
                ->withTimestamps();
    }

    public function posiciones():HasMany{
        return $this->hasMany(Posicion::class,'id_pechera');
    }

    
    /**generacion de codigo automatica*/
    protected static function booted()
    {
        static::creating(function ($pechera) {
            
            if (empty($pechera->codigo)) {
                $pechera->codigo = 'PGPS-' . str_pad(Pechera::max('id') + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
