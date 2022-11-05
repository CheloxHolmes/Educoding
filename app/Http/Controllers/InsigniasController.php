<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;
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
        $mensajes = DB::select("SELECT mensajes.id AS 'id_mensaje', titulo, descripcion, fecha_mensaje, id_creador, nombres, apellido_paterno FROM mensajes INNER JOIN usuario ON usuario.id = mensajes.id_creador ORDER BY fecha_mensaje DESC LIMIT 4;");
        $countMensajes = count($mensajes);
        $avatarImagen = DB::select("SELECT idimagen, nombre, descripcion, CONVERT(imagen using utf8) AS imagen FROM imagen WHERE nombre LIKE 'AV" . $usuario->id . "%' ORDER BY idimagen DESC;");
        if (count($avatarImagen) > 0) {
            $avatarImagen = $avatarImagen[0]->imagen;
            //return $avatarImagen;
        } else {
            $avatarImagen = "";
        }
        
        return view('insignias', [
            'insignia' => $insignia,
            'todosUsuarios' => $todoUsuarios,
            'avatar' => $imagen->descripcion,
            'usuario' => $usuario,
            'mensajes' => $mensajes,
            'countMensajes' => $countMensajes,
            'avatarImagen' => $avatarImagen,
        ]);
    }

    public function listaAlumnos()
    {
        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".Auth::id().";")[0];
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];
        $alumnos = DB::select("SELECT * FROM usuario INNER JOIN asigna_reim_alumno ON usuario.id = asigna_reim_alumno.usuario_id WHERE tipo_usuario_id = 3 AND reim_id = 905;");
        $mensajes = DB::select("SELECT mensajes.id AS 'id_mensaje', titulo, descripcion, fecha_mensaje, id_creador, nombres, apellido_paterno FROM mensajes INNER JOIN usuario ON usuario.id = mensajes.id_creador ORDER BY fecha_mensaje DESC LIMIT 4;");
        $countMensajes = count($mensajes);
        $avatarImagen = DB::select("SELECT idimagen, nombre, descripcion, CONVERT(imagen using utf8) AS imagen FROM imagen WHERE nombre LIKE 'AV" . $usuario->id . "%' ORDER BY idimagen DESC;");
        if (count($avatarImagen) > 0) {
            $avatarImagen = $avatarImagen[0]->imagen;
            //return $avatarImagen;
        } else {
            $avatarImagen = "";
        }
        

        for ($i = 0; $i<count($alumnos); $i++) {
            $alumnos[$i]->insignias = DB::select("SELECT * FROM inventario_reim INNER JOIN elemento on inventario_reim.id_elemento = elemento.id WHERE sesion_id = ".$alumnos[$i]->id." AND nombre LIKE 'Insignia%';");
            $alumnos[$i]->cantidadInsignias = count($alumnos[$i]->insignias);
        }

        $insignia = DB::select("SELECT * FROM elemento WHERE nombre LIKE 'Insignia%';");
        $todoUsuarios = User::all();

        return view('EnviarInsignia', [
            'alumnos' => $alumnos,
            'insignia' => $insignia,
            'todosUsuarios' => $todoUsuarios,
            'avatar' => $imagen->descripcion,
            'usuario' => $usuario,
            'mensajes' => $mensajes,
            'countMensajes' => $countMensajes,
            'avatarImagen' => $avatarImagen,
        ]);
    }

    public function enviarInsignia(Request $request){
        $data = $request->all();
        $alumnoTieneInsignia = DB::select("SELECT * FROM inventario_reim WHERE sesion_id = ".$data["id_alumno"]." AND id_elemento = ".$data["insignia"].";");
        if (count($alumnoTieneInsignia) > 0) {
            Session::flash('error', 'El alumno ya tiene esta insignia');
        }
        else {
            DB::insert("INSERT INTO inventario_reim (sesion_id, id_elemento, cantidad, datetime_creacion) VALUES (".$data["id_alumno"].", ".$data["insignia"].", 1, CURDATE())");
            Session::flash('success', 'Insignia otorgada con éxito');
        }
        return redirect("/EnviarInsignia");
    }

    public function eliminarInsignia(Request $request, $id_alumno, $id_insignia){
        DB::delete("DELETE FROM inventario_reim WHERE sesion_id = ".$id_alumno." AND id_elemento = ".$id_insignia.";");
        Session::flash('success', 'Insignia eliminada con éxito');
        return redirect("/EnviarInsignia");
    }
}
