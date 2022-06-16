<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mensaje;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MensajesController extends Controller
{
    public function VerMensajes()
    {

        $usuario = User::find(Auth::id());
        $mensajes = Mensaje::where('id_receptor', Auth::id())->get();
        $todoUsuarios = User::all();
        $countMensajes = count($mensajes);

        return view('mensajes', [

            'usuario' => $usuario,
            'mensajes' => $mensajes,
            'todoUsuarios' => $todoUsuarios,
            'countMensajes' => $countMensajes

        ]);
    }

    public function crearMensaje()

    {
        $users =  DB::table('users')->get();

        return view('crearMensaje', [
            'users' => $users,

        ]);
    }

    public function guardarMensaje(Request $request)

    {

        $datosInvalidos = false;

        if (strlen($request->titulo)<4){
            Session::flash('datosIncorrectosMsg', 'El título debe tener como mínimo 4 caracteres');
            $datosInvalidos = true;
        }

        if (strlen($request->titulo)>50){
            Session::flash('datosIncorrectosTitulo', 'El título debe tener como máximo 20 caracteres');
            $datosInvalidos = true;
        }

        if (strlen($request->descripcion_mensaje)<5){
            Session::flash('datosIncorrectosDescripcion', 'La descripción debe tener como mínimo 5 caracteres');
            $datosInvalidos = true;
        }
        if (strlen($request->descripcion_mensaje)>10000){
            Session::flash('datosIncorrectosDescripcionMax', 'La descripción debe tener como máximo 10000 caracteres');
            $datosInvalidos = true;
        }

        if ($datosInvalidos) {
            return redirect("/crearMensaje");
        }

        $post = Mensaje::create([

            'titulo' => $request->titulo,
            'id_creador' => Auth::id(),
            'id_receptor' => $request->id_receptor,
            'descripcion_mensaje' => $request->descripcion_mensaje,

        ]);

        Session::flash('mensajeCreado', '¡Mensaje Creado con éxito!');

        return redirect("/crearMensaje/".Auth::id());
    }

}
