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
        $actividad = DB::select("SELECT * FROM actividad WHERE id = " . $id . ";")[0];
        $books = DB::select("SELECT * FROM item WHERE reim_id = 905 AND objetivo_aprendizaje_id = '".$id."'; ");
        $usuario = User::find(Auth::id());
        $coins = DB::select("SELECT cantidad FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = '".$usuario->id."';")[0];
        /*for($i = 0; $i < count($books); ++$i) {
            $books[$i]->pages = DB::select("SELECT * FROM pages WHERE libro = " . $books[$i]->id . ";");
        }*/
        return view('actividad', [
            'actividad' => $actividad,
            'actividadString' => json_encode($actividad),
            'booksArrayString' => json_encode($books),
            'usuario' => $usuario,
            'coins' => $coins,
        ]);
    }

    public function sumarCoins($id)
    {
        $usuario = User::find(Auth::id());
        $coins = DB::select("SELECT cantidad FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = '".$usuario->id."';")[0];
        $coins = $coins + 3;
        $usuario->ModulosCompletados = $usuario->ModulosCompletados + 1;
        $usuario->save();
        return response()->json("{'resultado':'true'}");
    }
}
