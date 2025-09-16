<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * cambiando nombre a User
     * @ var array<int, string>
     */

    protected $table = 'usuarios'; 
    /**solo se colocar los campos rellenables , no id pero si idmascota(no null por que si no te pide obligatoriamente)*/
    protected $fillable = [
        'nombre_usuario', /**cambiar todo menos password e email*/
        'email',
        'password',
        'rol',
        'nombres',
        'ap_paterno',
        'ap_materno',
        'ci',
        'nro_celular',
        'sexo',
        'direccion',
        'eliminado',

    ];
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';

    /**
     * The attributes that should be hidden for serialization.
     * Atributos que no de deben o no se quiere devolver, se mantienen cultos para el usuario
     * @ var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function esAdmin(){
        return $this->rol ==='admin';
    }


    public function adopciones():HasMany{
    
        return $this->hasMany(Mascota::class,'id_usuario');
    }

    public function solicitudes():HasMany{
        return $this->hasMany(Solicitud::class,'id_usuario');
    }
    public function notificationes():BelongsToMany{
        return $this->belongsToMany(Notificacion::class,'notificaciones_usuarios','id_usuario','id_notificacion')
                ->withTimestamps(); /**igual aun si solo se usa uno de ambos*/
    }

}

