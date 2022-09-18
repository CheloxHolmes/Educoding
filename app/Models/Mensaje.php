<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    public $timestamps = false; 
    use HasFactory;

    protected $fillable = [

        'id_creador',
        'id_receptor',
        'titulo',
        'descripcion',
        'fecha_mensaje'

    ];

    protected $table = 'mensajes';
}
