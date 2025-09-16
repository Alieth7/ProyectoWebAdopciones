<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Notificacion extends Model
{
    use HasFactory;

    /**const mayusculas -solo update*/
    const CREATED_AT=null;
    const UPDATE_AT ='update_at';

    /**PK personalizada */
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';

    /**no id-create-update */
    protected $table='notificaciones';
    protected $fillable=['estado',
                         'mensaje',
                         'id_tipo'];


    public function usuarios():BelongsToMany{
        return $this->belongsToMany(Usuario::class,'notificaciones_usuarios','id_notificacion','id_usuario')
                ->withTimestamps();
                /**aun si solo se trabaja con update*/
    }
    public function tipo_notificaciones():BelongsTo{
        return $this->belongsTo(TipoNotificacion::class,'id_tipo');
    }
}
