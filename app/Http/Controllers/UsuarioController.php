<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function pruebita(){

        $test = Usuario::all();

        return view('about', [

            'test' => $test,

        ]);

    }
}
