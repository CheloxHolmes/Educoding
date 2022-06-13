<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mensaje;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MensajesController extends Controller
{
    public function VerMensajes()
    {

        $usuario = User::find(Auth::id());
        $mensajes = Mensaje::where('id_receptor', Auth::id())->get();
        $todoUsuarios = User::all();

        return view('mensajes', [

            'usuario' => $usuario,
            'mensajes' => $mensajes,
            'todoUsuarios' => $todoUsuarios

        ]);
    }
}
