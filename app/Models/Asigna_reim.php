<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asigna_reim extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'letra_id',
        'periodo_id',
        'reim_id',
        'colegio_id',
        'nivel_id'

    ];
    
    protected $table = 'asigna_reim';
}
