<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion_reim extends Model
{
    public $timestamps = false; 
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'usuarioenvia_id',
        'usuariorecibe_id',
        'elemento_id',
        'catalogo_id',
        'cantidad',
        'datetime_transac',
        'estado',

    ];

    protected $table = 'transaccion_reim';
}
