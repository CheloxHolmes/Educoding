<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Asigna_reim_alumno;
use App\Models\InventarioReim;
use App\Models\Imagen;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::id() != NULL) {
            $usuario = DB::select("SELECT * FROM usuario WHERE id = " . Auth::id() . ";")[0];
            if (DB::select("SELECT COUNT(*) AS cantidad FROM asigna_reim_alumno WHERE usuario_id = ".Auth::id()." AND reim_id = 905;")[0]->cantidad == 0) {
                Asigna_reim_alumno::create([
                    'sesion_id' => Auth::id(),
                    'usuario_id' => Auth::id(),
                    'periodo_id' => 202201,
                    'reim_id' => 905,
                    'datetime_inicio' => $usuario->created_at,
                    'datetime_termino' => $usuario->updated_at,
                ]);
                InventarioReim::create([
                    'sesion_id' => Auth::id(),
                    'id_elemento' => 900,
                    'cantidad' => 0,
                    'datetime_creacion' => $usuario->created_at,
                ]);
                InventarioReim::create([
                    'sesion_id' => Auth::id(),
                    'id_elemento' => 500,
                    'cantidad' => 0,
                    'datetime_creacion' => $usuario->created_at,
                ]);
                $unaimagen = DB::select("SELECT idimagen FROM imagen ORDER BY idimagen DESC LIMIT 1;")[0]->idimagen;
                Imagen::create([
                    'idimagen' => intval($unaimagen)+1,
                    'nombre' => 'AV'.$usuario->id,
                    'imagen' => 'avatar',
                    'id_elemento' => 101,
                    'descripcion' => 'user-(10).png',
                ]);
            }
        }
        return view('welcome');
    }
}
