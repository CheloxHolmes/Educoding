<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElemREIM extends Model
{
    public $timestamps = false; 
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'elemento_id',
        'reim_id',

    ];

    protected $table = 'Elem-REIM';
}
