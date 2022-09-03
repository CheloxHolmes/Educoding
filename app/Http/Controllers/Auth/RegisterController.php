<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Asigna_reim_alumno;
use App\Models\InventarioReim;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Imagen;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'rut' => $data['rut'],
            'email' => $data['email'],
            'password' => $data['password'],
            'tipo_usuario_id' => 3,
        ]);

        Asigna_reim_alumno::create([

            'sesion_id' => $usuario->id,
            'usuario_id' => $usuario->id,
            'periodo_id' => 1,
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

        Imagen::create([
            
            'nombre' => $usuario->email,
            'id_elemento' => 1,
            'descripcion' => 'user-(10).png',

        ]);

        return $usuario;
    }
}
