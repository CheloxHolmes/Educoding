<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function actividad($title)
    {

        $actividad = Activity::where('title', $title)->get();

        return view('actividad', [

            'actividad' => $actividad,

        ]);
    }
}
