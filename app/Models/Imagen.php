<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idimagen',
        'nombre',
        'imagen',
        'id_elemento',
        'id_elemento',
        'descripcion',

    ];

    protected $table = 'imagen';
}