<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Mensaje;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MensajesController extends Controller
{
    public function VerMensajes()
    {

        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".Auth::id().";")[0];
        $mensajes = DB::select("SELECT * FROM mensajes WHERE id_receptor = ".Auth::id().";");
        $todoUsuarios = DB::select("SELECT * FROM usuario");
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
        $usuarios =  DB::select("SELECT * FROM usuario");

        return view('crearMensaje', [
            'usuarios' => $usuarios,

        ]);
    }

    public function guardarMensaje(Request $request)

    {
        /*
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
            return redirect("/crearMensaje" . "/". Auth::id());
        }

        $post = Mensaje::create([

            'titulo' => $request->titulo,
            'id_creador' => Auth::id(),
            'id_receptor' => $request->id_receptor,
            'descripcion_mensaje' => $request->descripcion_mensaje,

        ]);

        Session::flash('mensajeCreado', '¡Mensaje Creado con éxito!');*/

        $data = $request->all();
                
        DB::insert("INSERT INTO mensajes (id_creador, id_receptor, titulo, descripcion, fecha_mensaje) VALUES (".Auth::id()." , ".$data["id_receptor"].", ".$data["titulo"].", ".$data["descripcion"].", ".Carbon::now()."");
        Session::flash('success', '¡Mensaje creado con éxito!');
        

        return redirect("/crearMensaje" . "/". Auth::id());
    }

}
