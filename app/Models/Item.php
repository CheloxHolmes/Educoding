<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pregunta',
        'justificacion',
        'dificultad',
        'imagen_idimagen',
        'reim_id',
        'objetivo_aprendizaje_id',
        'elemento_id',

    ];

    protected $table = 'item';
}
