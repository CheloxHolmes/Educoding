<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActividadController extends Controller
{
    public function actividad($id)
    {

        $actividad = Actividad::where('id', $id)->get();

        return view('actividad', [

            'actividad' => $actividad,

        ]);
    }
}
