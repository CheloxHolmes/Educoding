<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ColegiosController extends Controller
{
    public function colegios()
    {

        $colegios = DB::select("SELECT * FROM colegio;");
        $comunas = DB::select("SELECT * FROM comuna;");

        return view('colegios', [

            'colegios' => $colegios,
            'comunas' => $comunas,

        ]);
    }
}
