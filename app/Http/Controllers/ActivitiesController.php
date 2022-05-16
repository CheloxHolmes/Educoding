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
        $actividad = DB::select("SELECT * FROM activities WHERE id = " . $id . ";")[0];
        $books = DB::select("SELECT * FROM books WHERE actividad = " . $id . ";");
        $usuario = User::find(Auth::id());
        for($i = 0; $i < count($books); ++$i) {
            $books[$i]->pages = DB::select("SELECT * FROM pages WHERE libro = " . $books[$i]->id . ";");
        }
        return view('actividad', [
            'actividad' => $actividad,
            'actividadString' => json_encode($actividad),
            'booksArrayString' => json_encode($books),
            'usuario' => $usuario,
        ]);
    }
}
