<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imagen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Mensaje;

class UsuarioController extends Controller
{
    public function profile($id)
    {

        $usuario = User::where('id', $id)->get();
        $imagen = Imagen::where('nombre', $usuario->email)->get();

        return view('perfil', [

            'usuario' => $usuario,
            'avatar' => $imagen->descripcion,

        ]);
    }

    public function dashboard($id)
    {
        $usuario = User::where('id', $id)->get();
        $alumnos = User::where('tipo_usuario_id', 3)->get();
        //$mensajes = Mensaje::where('id_receptor', Auth::id())->get();
        //$countMensajes = count($mensajes);
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
            //'mensajes' => $mensajes,
            'todosUsuarios' => $todoUsuarios,
            //'countMensajes' => $countMensajes
        ]);
    }

    public function explore($id)
    {

        $usuario = User::where('id', $id)->get();

        return view('explorar', [

            'usuario' => $usuario,

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

    public function editAvatar($id, $newAvatar){

        $usuario = User::find(Auth::id());

        $usuario->avatar = $newAvatar;

        $usuario->update();

        return redirect("/perfil/$usuario->id");

    }
}
