<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiempoxactividad extends Model
{
    public $timestamps = false; 
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'inicio',
        'final',
        'causa',
        'usuario_id',
        'reim_id',
        'actividad_id',

    ];

    protected $table = 'tiempoxactividad';
}
