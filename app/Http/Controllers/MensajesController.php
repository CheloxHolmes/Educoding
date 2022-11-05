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
        $avatarImagen = DB::select("SELECT idimagen, nombre, descripcion, CONVERT(imagen using utf8) AS imagen FROM imagen WHERE nombre LIKE 'AV" . $usuario->id . "%' ORDER BY idimagen DESC;");
        if (count($avatarImagen) > 0) {
            $avatarImagen = $avatarImagen[0]->imagen;
            //return $avatarImagen;
        } else {
            $avatarImagen = "";
        }

        return view('mensajes', [

            'usuario' => $usuario,
            'mensajes' => $mensajes,
            'todoUsuarios' => $todoUsuarios,
            'countMensajes' => $countMensajes,
            'avatarImagen' => $avatarImagen,

        ]);
    }

    public function crearMensaje()

    {
        $usuarios =  DB::select("SELECT * FROM usuario INNER JOIN asigna_reim_alumno ON usuario.id = asigna_reim_alumno.usuario_id WHERE reim_id = 905;");

        return view('crearMensaje', [
            'usuarios' => $usuarios,

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

        if (strlen($request->descripcion)<5){
            Session::flash('datosIncorrectosDescripcion', 'La descripción debe tener como mínimo 5 caracteres');
            $datosInvalidos = true;
        }
        if (strlen($request->descripcion)>10000){
            Session::flash('datosIncorrectosDescripcionMax', 'La descripción debe tener como máximo 10000 caracteres');
            $datosInvalidos = true;
        }

        if ($datosInvalidos) {
            return redirect("/crearMensaje" . "/". Auth::id());
        }

        $unmensaje = DB::select("SELECT id FROM mensajes ORDER BY id DESC LIMIT 1;")[0]->id;

        DB::insert("INSERT INTO mensajes (id, titulo, id_creador, id_receptor, descripcion, fecha_mensaje) VALUES (".($unmensaje+1).", '".$request->titulo."', ".Auth::id().", ".$request->id_receptor.", '".$request->descripcion."', '".Carbon::now()."');");

        /*$post = Mensaje::create([

            'id' => $unmensaje+1,
            'titulo' => $request->titulo,
            'id_creador' => Auth::id(),
            'id_receptor' => $request->id_receptor,
            'descripcion' => $request->descripcion,
            'fecha_mensaje' => Carbon::now(),

        ]);*/

        Session::flash('mensajeCreado', '¡Mensaje Creado con éxito!');

        return redirect("/crearMensaje" . "/". Auth::id());
    }

}
