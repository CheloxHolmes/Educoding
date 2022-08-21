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
        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".Auth::id().";")[0];
        $insignia = DB::select("SELECT * FROM imagen WHERE id_elemento BETWEEN 301 AND 307;");
        $todoUsuarios = User::all();
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];
        
        return view('insignias', [
            'insignia' => $insignia,
            'todosUsuarios' => $todoUsuarios,
            'avatar' => $imagen->descripcion,
            'usuario' => $usuario,
        ]);
    }

    public function listaAlumnos()
    {
        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".Auth::id().";")[0];
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];
        $alumnos = DB::select("SELECT * FROM usuario WHERE tipo_usuario_id = 3;");
        $insignia = DB::select("SELECT * FROM imagen WHERE id_elemento BETWEEN 301 AND 307;");
        $todoUsuarios = User::all();

        return view('EnviarInsignia', [
            'alumnos' => $alumnos,
            'insignia' => $insignia,
            'todosUsuarios' => $todoUsuarios,
            'avatar' => $imagen->descripcion,
            'usuario' => $usuario,
        ]);
    }
}
