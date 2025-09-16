<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Posicion extends Model
{
    use HasFactory;

    /**const mayusculas -solo update*/
    const CREATE_AT='create_at';
    const UPDATE_AT=null;

    /**pk personalizada*/
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';

    protected $table='posiciones';
    protected $fillable=['latitud',
                         'longitud',
                         'id_pechera'];


    public function pecheras():BelongsTo{
        return $this->belongsTo(Pechera::class,'id_pechera');
    }

}

