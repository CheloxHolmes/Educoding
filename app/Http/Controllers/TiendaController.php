<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TiendaController extends Controller
{
    public function tienda(){
        
        $id = Auth::id();

        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".$id.";")[0];
        
        $items = DB::select("SELECT * FROM imagen WHERE id_elemento BETWEEN 400 AND 417;");

        $coins = DB::select("SELECT cantidad FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = '".$usuario->id."';")[0];

        $modulosCompletados = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 500 AND sesion_id = " . $usuario->id . ";")[0];

        return view('tienda', [
            'coins' => $coins,
            'items' => $items,
            'modulosCompletados' => $modulosCompletados->cantidad,
        ]);
    }
    public function comprar(Request $request, $id_elemento){

        //$elemento = DB::select("SELECT * FROM elemento WHERE id BETWEEN 400 AND 417;")[0];

        $id_usuario = Auth::id();
        $alumnoTieneElemento = DB::select("SELECT * FROM inventario_reim WHERE sesion_id = ".$id_usuario." AND id_elemento = ".$id_elemento.";");

        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".$id_usuario.";")[0];

        $catalogo_elemento = DB::select("SELECT * FROM catalogo_reim WHERE id_elemento = ".$id_elemento.";")[0];
        $precio = $catalogo_elemento->precio;
        $coins = DB::select("SELECT cantidad FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = '".$usuario->id."';")[0]->cantidad;

        if ($coins < $precio) {
            Session::flash('error_image', 'No tienes suficientes uLearnet coins . Completa más actividades para conseguir más.'); //Reemplazar por imagen de ulearnet coins
        }
        else {
            /*
            if (count($alumnoTieneElemento) > 0) {
                Session::flash('error', 'El alumno ya tiene este item');
            }
            else {
                DB::insert("INSERT INTO inventario_reim (sesion_id, id_elemento, cantidad, datetime_creacion) VALUES (".$id_usuario.", ".$id_elemento.", 1, CURDATE())");
                DB::update("UPDATE inventario_reim SET cantidad = (cantidad - ".$precio.") WHERE id_elemento = 900 AND sesion_id = '".$id_usuario."';");
                Session::flash('success', 'Item comprado exitosamente');
            }*/

            DB::insert("INSERT INTO inventario_reim (sesion_id, id_elemento, cantidad, datetime_creacion) VALUES (".$id_usuario.", ".$id_elemento.", 1, CURDATE())");
            DB::update("UPDATE inventario_reim SET cantidad = (cantidad - ".$precio.") WHERE id_elemento = 900 AND sesion_id = '".$id_usuario."';");
            Session::flash('success', 'Item comprado exitosamente');
        }




        return redirect("/tienda");

    }
}
