<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Observacion extends Model
{
    use HasFactory;

    const CREATE_AT='create_at';
    const UPDATE_AT=null;

    /**PK personalizada*/
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';

    /**no id-create */
    protected $table='observaciones';
    protected $fillable=['descripcion'];

    
    public function periodo_pruebas():BelongsTo{
        return $this->belongsTo(PeriodoPrueba::class,'id_observacion');
    }

}
