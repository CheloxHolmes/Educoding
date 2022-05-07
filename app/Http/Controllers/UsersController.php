<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function profile($id)
    {

        $usuario = User::where('id', $id)->get();

        return view('perfil', [

            'usuario' => $usuario,

        ]);
    }

    public function explore($id)
    {

        $usuario = User::where('id', $id)->get();

        return view('explorar', [

            'usuario' => $usuario,

        ]);
    }

    public function editProfile($id)
    {

        $usuario = User::where('id', $id)->get();

        return view('editar', [

            'usuario' => $usuario,

        ]);
    }

    public function updateProfile(Request $request, $id)
    {
        $datosInvalidos = false;

        if (strlen($request->name)<4){
            Session::flash('userCorto', 'El nombre del usuario debe tener como mínimo 4 caracteres');
            $datosInvalidos = true;
        }

        if (strlen($request->name)>30){
            Session::flash('userLargo', 'El nombre del usuario debe tener como máximo 30 caracteres');
            $datosInvalidos = true;
        }

        if ($datosInvalidos) {
            return redirect("/editar/perfil" ."/". "$id");
        }

        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->username = $request->get('username');
        $usuario->telefono = $request->get('telefono');
        $usuario->direccion = $request->get('direccion');

        $usuario->update();

        return redirect("/perfil/$usuario->id");
    }

    public function editAvatar($id, $newAvatar){

        $usuario = User::find(Auth::id());

        $usuario->avatar = $newAvatar;

        $usuario->update();

        return redirect("/perfil/$usuario->id");

    }
}
