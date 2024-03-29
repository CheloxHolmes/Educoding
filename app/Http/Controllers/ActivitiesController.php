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
        $ids_books = DB::select("SELECT elemento_id FROM item WHERE objetivo_aprendizaje_id = ".$id." GROUP BY elemento_id;");
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = 'AV" . $usuario->id . "';")[0];
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
                if ($books[$i]->pages[$p]->IMAGEN_idimagen) {
                    $imagenEncontrada = DB::select("SELECT * FROM imagen WHERE idimagen = ".$books[$i]->pages[$p]->IMAGEN_idimagen.";")[0];
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
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = 'AV" . $usuario->id . "';")[0];
        $modulosCompletados = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 500 AND sesion_id = ".$usuario->id.";")[0];
        $pauta = DB::select("SELECT Pregunta AS 'pauta' FROM item WHERE reim_id = 905 AND objetivo_aprendizaje_id = 24 ORDER BY RAND() LIMIT 1;")[0]->pauta;
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
            'pauta' => $pauta,
        ]);
    }

    public function agregarRespuesta($idUsuario, $idAct, Request $request)
    {
        $data = $request->all();
        $usuario = DB::select("SELECT * FROM usuario WHERE id = " . Auth::id() . ";")[0];
        //echo ($data["image_64"]);
        $pauta1 = $data["pauta"];
        $pauta2 = substr($pauta1, -224);
        $unaimagen = DB::select("SELECT idimagen FROM imagen ORDER BY idimagen DESC LIMIT 1;")[0]->idimagen;
        $idimg = intval($unaimagen)+1;
        DB::insert("INSERT INTO alumno_respuesta_actividad VALUES (202201, " . Auth::id() . ", 905, 24, 101, now(), 1, 1, 1, ".$idimg.", '".$pauta2."', ".$data["estado"].");");
        DB::insert("INSERT INTO imagen (idimagen, nombre, imagen, id_elemento, descripcion) VALUES (".$idimg.",'AL".Auth::id()."', '".$data["image_64"]."', 101, 'DIBUJO');");
        Session::flash('success', 'Respuesta enviada con éxito');
        return redirect("/actividadLenguaje/$idAct");
    }

    public function sumarCoins($id_libro, $correcta, Request $request)
    {
        $data = $request->all();
        $usuario = User::find(Auth::id());
        if ($correcta == "SI") {
            DB::update("UPDATE inventario_reim SET cantidad = (cantidad + 3) WHERE id_elemento = 900 AND sesion_id = '".$usuario->id."';");
            DB::update("UPDATE inventario_reim SET cantidad = (cantidad + 1) WHERE id_elemento = 500 AND sesion_id = '".$usuario->id."';");
            DB::insert("INSERT INTO alumno_respuesta_actividad VALUES (202201, " . Auth::id() . ", 905, ".$data['id_actividad'].", 101, now(), 1, 1, 1, 1, '".$data['respuestaEsperada']."', 0);");
        }
        else {
            DB::insert("INSERT INTO alumno_respuesta_actividad VALUES (202201, " . Auth::id() . ", 905, ".$data['id_actividad'].", 101, now(), 1, 1, 1, 0, '".$data['respuestaEsperada']."', 0);");
        }

        return response()->json("{'resultado':'true'}");
    }

    public function respuestas($id)
    {
        $usuario = User::find(Auth::id());
        $colegioProfe = DB::select("SELECT colegio_id  AS 'colegioProfe' FROM usuario INNER JOIN asigna_reim_alumno ON usuario.id = asigna_reim_alumno.usuario_id INNER JOIN pertenece ON usuario.id = pertenece.usuario_id WHERE usuario.id = " . Auth::id() . " AND reim_id = 905 LIMIT 1;")[0]->colegioProfe;
        $actividad = DB::select("SELECT * FROM actividad WHERE id = " . $id . ";")[0];
        $ids_books = DB::select("SELECT elemento_id FROM item WHERE objetivo_aprendizaje_id = ".$id." GROUP BY elemento_id;");
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = 'AV" . $usuario->id . "';")[0];
        $modulosCompletados = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 500 AND sesion_id = ".$usuario->id.";")[0];
        $cursos = DB::select("SELECT * FROM nivel");
        $colegios = DB::select("SELECT * FROM colegio");
        $respuestas = DB::select("SELECT id_user, datetime_touch, correcta, resultado, nombres, apellido_paterno, colegio_id, nivel_id FROM alumno_respuesta_actividad INNER JOIN usuario ON usuario.id = alumno_respuesta_actividad.id_user INNER JOIN pertenece ON alumno_respuesta_actividad.id_user = pertenece.usuario_id WHERE id_actividad = ".$id." AND colegio_id = ".$colegioProfe." AND tipo_usuario_id = 3;");
        $avatarImagen = DB::select("SELECT idimagen, nombre, descripcion, CONVERT(imagen using utf8) AS imagen FROM imagen WHERE nombre LIKE 'AV" . $usuario->id . "%' ORDER BY idimagen DESC;");
        if (count($avatarImagen) > 0) {
            $avatarImagen = $avatarImagen[0]->imagen;
            //return $avatarImagen;
        } else {
            $avatarImagen = "";
        }

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
            'avatarImagen' => $avatarImagen,
            'colegioProfe' => $colegioProfe,
            'cursos' => $cursos,
            'colegios' => $colegios,
        ]);
    }


}
