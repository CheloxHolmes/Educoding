<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    public $timestamps = false; 
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'idalternativa',
        'txt_alte',
        'IMAGEN_idimagen',
        'Justificacion',

    ];

    protected $table = 'alternativa';
}
