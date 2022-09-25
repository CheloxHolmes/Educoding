<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ActivitiesController extends Controller
{
    public function actividad($id)
    {
        $usuario = User::find(Auth::id());
        $actividad = DB::select("SELECT * FROM actividad WHERE id = " . $id . ";")[0];
        $ids_books = DB::select("SELECT elemento_id FROM eccloud.item WHERE objetivo_aprendizaje_id = ".$id." GROUP BY elemento_id;");
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];
        $background1 = DB::select("SELECT * FROM imagen WHERE nombre LIKE 'AA".$actividad->id."-1';")[0];
        $background2 = DB::select("SELECT * FROM imagen WHERE nombre LIKE 'AA".$actividad->id."-2';")[0];
        $modulosCompletados = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 500 AND sesion_id = ".$usuario->id.";")[0];

        $books = [];

        for($i = 0; $i < count($ids_books); ++$i) {
            $book = DB::select("SELECT * FROM elemento WHERE id = " . $ids_books[$i]->elemento_id . ";")[0];
            array_push($books, $book);
        }
        
        $inventario = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = ".$usuario->id.";")[0];
        $coins = $inventario->cantidad;

        for($i = 0; $i < count($books); ++$i) {
            $books[$i]->pages = DB::select("SELECT * FROM item WHERE elemento_id = ".$books[$i]->id.";");

            for($p = 0; $p < count($books[$i]->pages); ++$p) {
                if ($books[$i]->pages[$p]->imagen_idimagen) {
                    echo($books[$i]->pages[$p]->imagen_idimagen);
                    $imagenEncontrada = DB::select("SELECT * FROM imagen WHERE idimagen = ".$books[$i]->pages[$p]->imagen_idimagen.";")[0];
                    if ($imagenEncontrada) {
                        $books[$i]->pages[$p]->imagen = $imagenEncontrada->descripcion;
                    } 
                }
            }
        }

        return view('actividad', [
            'actividad' => $actividad,
            'actividadString' => json_encode($actividad),
            'avatar' => $imagen->descripcion,
            'booksArrayString' => json_encode($books),
            'usuario' => $usuario,
            'coins' => $coins,
            'modulosCompletados' => $modulosCompletados->cantidad,
            'background1' => $background1->descripcion,
            'background2' => $background2->descripcion,
        ]);
    }

    public function actividadLenguaje($id){
        $usuario = User::find(Auth::id());
        $actividad = DB::select("SELECT * FROM actividad WHERE id = " . $id . ";")[0];
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];
        $modulosCompletados = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 500 AND sesion_id = ".$usuario->id.";")[0];
        $actividad = DB::select("SELECT * FROM actividad WHERE id = " . $id . ";")[0];
        $inventario = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = ".$usuario->id.";")[0];
        $coins = $inventario->cantidad;
        $respuestaImagen = DB::select("SELECT idimagen, nombre, descripcion, CONVERT(imagen using utf8) AS imagen FROM imagen WHERE nombre LIKE 'AL".$usuario->id."%' ORDER BY idimagen DESC;");
        if (count($respuestaImagen)>0) {
            $respuestaImagen = $respuestaImagen[0];
        }
        return view('actividadLenguaje', [
            'actividad' => $actividad,
            'actividadString' => json_encode($actividad),
            'avatar' => $imagen->descripcion,
            'usuario' => $usuario,
            'coins' => $coins,
            'respuestaImagen' => $respuestaImagen,
            'modulosCompletados' => $modulosCompletados->cantidad,
        ]);
    }

    public function agregarRespuesta($idUsuario, $idAct, Request $request)
    {
        $data = $request->all();
        $usuario = DB::select("SELECT * FROM usuario WHERE id = " . Auth::id() . ";")[0];
        //echo ($data["image_64"]);
        DB::insert("INSERT INTO alumno_respuesta_actidad VALUES (" . Auth::id() . ", " . Auth::id() . ", 905, 24, 101, curdate(), 1, 1, 1, 1, 1, NULL);");
        DB::insert("INSERT INTO imagen (nombre, imagen, id_elemento, descripcion) VALUES ('AL".Auth::id()."', '".$data["image_64"]."', 101, 'DIBUJO');");
        Session::flash('success', 'Respuesta enviada con éxito');
        return redirect("/actividadLenguaje/$idAct");
    }

    public function sumarCoins($id_libro, $correcta, Request $request)
    {
        $data = $request->all();
        $usuario = User::find(Auth::id());
        if ($correcta == "SI") {
            DB::update("UPDATE inventario_reim SET cantidad = (cantidad + 3) WHERE id_elemento = 900 AND sesion_id = ".$usuario->id.";");
            DB::update("UPDATE inventario_reim SET cantidad = (cantidad + 1) WHERE id_elemento = 500 AND sesion_id = ".$usuario->id.";");
            DB::insert("INSERT INTO alumno_respuesta_actidad VALUES (" . Auth::id() . ", " . Auth::id() . ", 905, ".$data['id_actividad'].", 101, curdate(), 1, 1, 1, 1, ".$data['respuestaEsperada'].", NULL);");
        }
        else {
            DB::insert("INSERT INTO alumno_respuesta_actidad VALUES (" . Auth::id() . ", " . Auth::id() . ", 905, ".$data['id_actividad'].", 101, curdate(), 1, 1, 1, 0, ".$data['respuestaEsperada'].", NULL);");
        }

        return response()->json("{'resultado':'true'}");
    }

    public function respuestas($id)
    {
        $usuario = User::find(Auth::id());
        $actividad = DB::select("SELECT * FROM actividad WHERE id = " . $id . ";")[0];
        $ids_books = DB::select("SELECT elemento_id FROM eccloud.item WHERE objetivo_aprendizaje_id = ".$id." GROUP BY elemento_id;");
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];
        $modulosCompletados = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 500 AND sesion_id = ".$usuario->id.";")[0];

        $respuestas = DB::select("SELECT id_per, datetime_touch, correcta, resultado, nombres, apellido_paterno FROM alumno_respuesta_actidad INNER JOIN usuario ON usuario.id = alumno_respuesta_actidad.id_per WHERE id_actividad = ".$id.";");

        $books = [];

        for($i = 0; $i < count($ids_books); ++$i) {
            $book = DB::select("SELECT * FROM elemento WHERE id = " . $ids_books[$i]->elemento_id . ";")[0];
            array_push($books, $book);
        }
        
        $inventario = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = ".$usuario->id.";")[0];
        $coins = $inventario->cantidad;

        return view('respuestasActividad', [
            'actividad' => $actividad,
            'actividadString' => json_encode($actividad),
            'avatar' => $imagen->descripcion,
            'usuario' => $usuario,
            'coins' => $coins,
            'books' => $books,
            'respuestas' => $respuestas,
            'modulosCompletados' => $modulosCompletados->cantidad,
        ]);
    }


}
