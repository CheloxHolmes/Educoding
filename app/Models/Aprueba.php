<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprueba extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idusuario',
        'idimagen',
        'fecha_aprueba',
        'justificacion',
        'esaprobado'

    ];
    
    protected $table = 'aprueba';
}
