<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Raza extends Model
{
    use HasFactory;
    /**const CREATE_AT=null;
      const UPDATE_AT=null;*/
    public $timestamps= false;

    protected $primaryKey = 'id';
    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $table='razas';
    protected $fillable=['nombre',
                        'especie'];


    public function mascotas():HasMany {
        return $this->hasMany(Mascota::class,'id_raza');
    }
}
