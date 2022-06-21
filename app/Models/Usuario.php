<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
    ];
    
    protected $table = 'usuario';
}
