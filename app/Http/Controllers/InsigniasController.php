<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Insignia;
use App\Models\User;
use Illuminate\Support\Str;

class InsigniasController extends Controller
{
    public function insignias()
    {
        $insignia = Insignia::all();
        
        return view('insignias', [
            'insignia' => $insignia,
        ]);
    }

    public function listaAlumnos()
    {
        $alumnos = User::where('rol', 'alumno')->get();
        $insignia = Insignia::all();

        return view('EnviarInsignia', [
            'alumnos' => $alumnos,
            'insignia' => $insignia,
        ]);
    }
}
