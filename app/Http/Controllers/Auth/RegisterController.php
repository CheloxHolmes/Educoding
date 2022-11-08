<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Asigna_reim_alumno;
use App\Models\InventarioReim;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Models\Imagen;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME; //Crear lógica para re dirigir tipo_usuario_id=3 con historias de usuario <-- así era
    protected $redirectTo = "/educoding";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombres' => ['required', 'string', 'max:255'],
            'rut' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuario'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $usuario = User::create([
            'nombres' => $data['nombres'],
            'apellido_paterno' => $data['apellido_paterno'],
            'apellido_materno' => $data['apellido_materno'],
            'rut' => $data['rut'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => $data['password'],
            'tipo_usuario_id' => 3,
        ]);

        //DB::insert("INSERT INTO asigna_reim_alumno (sesion_id, usuario_id, periodo_id, reim_id, datetime_inicio, datetime_termino) VALUES ('".$usuario->id."','".$usuario->id."', 1, 905, '".$usuario->created_at."', '".$usuario->updated_at."');");

        Asigna_reim_alumno::create([


            'sesion_id' => $usuario->id,
            'usuario_id' => $usuario->id,
            'periodo_id' => 202201,
            'reim_id' => 905,
            'datetime_inicio' => $usuario->created_at,
            'datetime_termino' => $usuario->updated_at,

        ]);

        InventarioReim::create([

            'sesion_id' => $usuario->id,
            'id_elemento' => 900,
            'cantidad' => 0,
            'datetime_creacion' => $usuario->created_at,

        ]);

        InventarioReim::create([

            'sesion_id' => $usuario->id,
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

        return $usuario;
    }
}
