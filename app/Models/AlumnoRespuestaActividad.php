<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnoRespuestaActividad extends Model
{
    public $timestamps = false; 
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'id_per',
        'id_user',
        'id_reim',
        'id_actividad',
        'id_elemento',
        'datetime_touch',
        'Eje_X',
        'Eje_Y',
        'Eje_Z',
        'correcta',
        'resultado',
        'Tipo_Registro',

    ];

    protected $table = 'alumno_respuesta_actividad';
}
