<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'direccion',
        'fono',
        'rbd',
        'dgv_rbd',
        'mrun',
        'rut_sostenedor',
        'p_juridica',
        'rural',
        'comuna_id'
    ];
    
    protected $table = 'colegio';
}
