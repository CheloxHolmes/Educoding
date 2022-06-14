<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Insignia;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Auth;

class InsigniasController extends Controller
{
    public function insignias()
    {
        $insignia = Insignia::all();
        $mensajes = Mensaje::where('id_receptor', Auth::id())->get();
        $countMensajes = count($mensajes);
        $todoUsuarios = User::all();
        
        return view('insignias', [
            'insignia' => $insignia,
            'mensajes' => $mensajes,
            'todosUsuarios' => $todoUsuarios,
            'countMensajes' => $countMensajes
        ]);
    }

    public function listaAlumnos()
    {
        $alumnos = User::where('rol', 'alumno')->get();
        $insignia = Insignia::all();
        $mensajes = Mensaje::where('id_receptor', Auth::id())->get();
        $countMensajes = count($mensajes);
        $todoUsuarios = User::all();

        return view('EnviarInsignia', [
            'alumnos' => $alumnos,
            'insignia' => $insignia,
            'mensajes' => $mensajes,
            'todosUsuarios' => $todoUsuarios,
            'countMensajes' => $countMensajes
        ]);
    }
}
