<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoNotificacion extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';

    protected $table='tipo_notificaciones';
    protected $fillable=['nombre'];


    public function notificaciones():HasMany{
        return $this->hasMany(Notificacion::class,'id_tipo');
    }
}
