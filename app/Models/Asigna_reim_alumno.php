<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asigna_reim_alumno extends Model
{
    public $timestamps = false; 
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'sesion_id',
        'usuario_id',
        'periodo_id',
        'reim_id',
        'datetime_inicio',
        'datetime_termino',

    ];

    protected $table = 'asigna_reim_alumno';
}
