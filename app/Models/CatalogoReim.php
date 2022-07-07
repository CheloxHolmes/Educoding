<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoReim extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'sesion_id',
        'id_elemento',
        'cantidad',
        'precio',
        'datetime_realiza',

    ];

    protected $table = 'catalogo_reim';
}