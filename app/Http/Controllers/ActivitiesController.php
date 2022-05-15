<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Activity;
use App\Models\Book;
use App\Models\Page;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function actividad($id)
    {
        $actividad = DB::select("SELECT * FROM activities WHERE id = " . $id . ";")[0];
        $books = DB::select("SELECT * FROM books WHERE actividad = " . $id . ";");
        for($i = 0; $i < count($books); ++$i) {
            $books[$i]->pages = DB::select("SELECT * FROM pages WHERE libro = " . $books[$i]->id . ";");
        }
        return view('actividad', [
            'actividad' => $actividad,
            'actividadString' => json_encode($actividad),
            'books' => $books,
            'booksArrayString' => json_encode($books),
        ]);
    }
}
