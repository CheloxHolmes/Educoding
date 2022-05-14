<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function actividad($nombre)
    {

        $actividad = Activity::where('nombre', $nombre)->get();

        return view('actividad', [

            'actividad' => $actividad,

        ]);
    }
}
