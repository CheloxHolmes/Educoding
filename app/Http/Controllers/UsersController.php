<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Mensaje;

class UsersController extends Controller
{
    public function profile($id)
    {

        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".$id.";")[0];
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];
        $coins = DB::select("SELECT cantidad FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = '".$usuario->id."';")[0];
        $rol = DB::select("SELECT nombre FROM tipo_usuario WHERE id = '".$usuario->tipo_usuario_id."';")[0];
        //$imagen = Imagen::where('nombre', $usuario->email)->get();

        return view('perfil', [

            'usuario' => $usuario,
            'avatar' => $imagen->descripcion,
            'coins' => $coins,
            'rol' => $rol,

        ]);
    }

    public function dashboard($id)
    {
        $usuario = User::where('id', $id)->get();
        $alumnos = User::where('rol', 'alumno')->get();
        $mensajes = Mensaje::where('id_receptor', Auth::id())->get();
        $countMensajes = count($mensajes);
        $todoUsuarios = User::all();

        $cant = count($alumnos);
        $sumaCoins = 0;
        for($i = 0; $i < count($alumnos); ++$i) {
            $sumaCoins = $alumnos[$i]->coins+$sumaCoins;
        }
        $sumaModulos = 0;
        for($i = 0; $i < count($alumnos); ++$i) {
            $sumaModulos = $alumnos[$i]->ModulosCompletados+$sumaModulos;
        }

        $cantidadesModulosCompletadosMes = [3,7,8,1,2,3,9];

        return view('dashboard', [

            'alumnos' => $alumnos,
            'cant' => $cant,
            'usuario' => $usuario,
            'sumaCoins' => $sumaCoins,
            'sumaModulos' => $sumaModulos,
            'cantidadesModulosCompletadosMes' => $cantidadesModulosCompletadosMes,
            'mensajes' => $mensajes,
            'todosUsuarios' => $todoUsuarios,
            'countMensajes' => $countMensajes
        ]);
    }

    public function explore($id)
    {

        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".$id.";")[0];
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];
        $coins = DB::select("SELECT cantidad FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = '".$usuario->id."';")[0];
        
        //$imagen = Imagen::where('nombre', $usuario->email)->get();

        return view('explorar', [

            'usuario' => $usuario,
            'avatar' => $imagen->descripcion,
            'coins' => $coins,
            
        ]);
    }

    public function editProfile($id)
    {

        $usuario = User::where('id', $id)->get();

        return view('editar', [

            'usuario' => $usuario,

        ]);
    }

    public function updateProfile(Request $request, $id)
    {
        $datosInvalidos = false;

        if (strlen($request->name)<4){
            Session::flash('userCorto', 'El nombre del usuario debe tener como mínimo 4 caracteres');
            $datosInvalidos = true;
        }

        if (strlen($request->name)>30){
            Session::flash('userLargo', 'El nombre del usuario debe tener como máximo 30 caracteres');
            $datosInvalidos = true;
        }

        if ($datosInvalidos) {
            return redirect("/editar/perfil" ."/". "$id");
        }

        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->username = $request->get('username');
        $usuario->telefono = $request->get('telefono');
        $usuario->direccion = $request->get('direccion');

        $usuario->update();

        return redirect("/perfil/$usuario->id");
    }

    public function editAvatar($newAvatar){
        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".Auth::id().";")[0];
        DB::select("UPDATE imagen SET descripcion = '".$newAvatar."' WHERE nombre = '".$usuario->email."';");
        return redirect("/perfil/$usuario->id");
    }
}
