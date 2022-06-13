<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Insignia;

class InsigniasController extends Controller
{
    public function insignias()
    {
        $insignia = Insignia::all();
        
        return view('insignias', [
            'insignia' => $insignia,
        ]);
    }
}
