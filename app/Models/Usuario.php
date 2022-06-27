<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'rut',
        'fecha_nacimiento',
        'telefono',
        'alumno',
        'email',
        'username',
        'password',
        'is_active',
        'last_login',
        'sexo',
        'tipo_usuario_id',
        'nick_name'
    ];*/

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password',
        'remember_token',
    ];*/

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected $table = 'usuario';*/
}
