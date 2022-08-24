<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Activity;
use App\Models\Book;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
    public function actividad($id)
    {
        $usuario = User::find(Auth::id());
        $actividad = DB::select("SELECT * FROM actividad WHERE id = " . $id . ";")[0];
        $ids_books = DB::select("SELECT elemento_id FROM eccloud.item WHERE objetivo_aprendizaje_id = ".$id." GROUP BY elemento_id;");
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];

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
        ]);
    }

    public function sumarCoins()
    {
        $usuario = User::find(Auth::id());

        DB::update("UPDATE inventario_reim SET cantidad = (cantidad + 3) WHERE id_elemento = 900 AND sesion_id = ".$usuario->id.";");

        return response()->json("{'resultado':'true'}");
    }
}
