<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_alt extends Model
{
    public $timestamps = false; 
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'indice',
        'idalternativa',
        'orden',
        'escorrecto',
        'ITEM_IdItem',

    ];

    protected $table = 'item_alt';
}
