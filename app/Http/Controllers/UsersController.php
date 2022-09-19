<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Imagen;
use App\Models\InventarioReim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Mensaje;

class UsersController extends Controller
{
    public function profile($id)
    {

        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".$id.";")[0];
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];
        $coins = DB::select("SELECT cantidad FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = '".$usuario->id."';")[0];
        $rol = DB::select("SELECT nombre FROM tipo_usuario WHERE id = '".$usuario->tipo_usuario_id."';")[0];

        $insignias = DB::select("SELECT * FROM inventario_reim INNER JOIN elemento on inventario_reim.id_elemento = elemento.id INNER JOIN imagen on inventario_reim.id_elemento = imagen.id_elemento WHERE sesion_id = ".$usuario->id." AND elemento.nombre LIKE 'Insignia%';");
        $items = DB::select("SELECT * FROM inventario_reim INNER JOIN elemento on inventario_reim.id_elemento = elemento.id INNER JOIN imagen on inventario_reim.id_elemento = imagen.id_elemento WHERE sesion_id = ".$usuario->id." AND elemento.id BETWEEN 400 AND 417;");
        $cantidadInsignias = count($insignias);
        $modulosCompletados = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 500 AND sesion_id = ".$usuario->id.";")[0];

        return view('perfil', [

            'usuario' => $usuario,
            'avatar' => $imagen->descripcion,
            'coins' => $coins,
            'rol' => $rol,
            'insignias' => $insignias,
            'items' => $items,
            'modulosCompletados' => $modulosCompletados,

        ]);
    }

    public function dashboard($id)
    {
        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".$id.";")[0];
        $alumnos = DB::select("SELECT * FROM usuario WHERE tipo_usuario_id = 3;")[0];
        $cAlumnos = User::where('tipo_usuario_id', 3)->get();
        $inventarioAlumno = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = ".$alumnos->id.";")[0];
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];
        $sumaModulos = DB::select("SELECT SUM(cantidad) FROM inventario_reim WHERE id_elemento = 500;");
        $mensajes = Mensaje::where('id_receptor', Auth::id())->get();
        $countMensajes = count($mensajes);
        $todoUsuarios = User::all();

        $cant = count($cAlumnos);
        $sumaCoins = 0;
        for($i = 0; $i < $cant; ++$i) {
            $sumaCoins = $inventarioAlumno->cantidad+$sumaCoins;
        }

        $cantidadesModulosCompletadosMes = [3,7,8,1,2,3,9];

        return view('dashboard', [

            'alumnos' => $cAlumnos,
            'cant' => $cant,
            'usuario' => $usuario,
            'avatar' => $imagen->descripcion,
            'sumaCoins' => $sumaCoins,
            'sumaModulos' => $sumaModulos,
            'cantidadesModulosCompletadosMes' => $cantidadesModulosCompletadosMes,
            'mensajes' => $mensajes,
            'todosUsuarios' => $todoUsuarios,
            'countMensajes' => $countMensajes
        ]);
    }

    public function explore($id)
    {

        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".$id.";")[0];
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '".$usuario->email."';")[0];
        $coins = DB::select("SELECT cantidad FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = '".$usuario->id."';")[0];
        $modulosCompletados = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 500 AND sesion_id = ".$usuario->id.";")[0];
        
        //$imagen = Imagen::where('nombre', $usuario->email)->get();

        return view('explorar', [

            'usuario' => $usuario,
            'avatar' => $imagen->descripcion,
            'coins' => $coins,
            'modulosCompletados' => $modulosCompletados->cantidad,
            
        ]);
    }

    public function editProfile($id)
    {

        $usuario = User::where('id', $id)->get();

        return view('editar', [

            'usuario' => $usuario,

        ]);
    }

    public function editAvatar($newAvatar){
        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".Auth::id().";")[0];
        DB::select("UPDATE imagen SET descripcion = '".$newAvatar."' WHERE nombre = '".$usuario->email."';");
        return redirect("/perfil/$usuario->id");
    }

    public function admin($id){

        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".$id.";")[0];
        $admin = DB::select("SELECT * FROM usuario WHERE tipo_usuario_id = 1;")[0];
        $allUsers = DB::select("SELECT usuario.id, tipo_usuario_id, tipo_usuario.nombre, usuario.nombres, usuario.email FROM usuario INNER JOIN tipo_usuario on usuario.tipo_usuario_id = tipo_usuario.id;");

        return view('admin', [

            'admin' => $admin,
            'usuario' => $usuario,
            'allUsers' => $allUsers,
        ]);

    }

    public function cambiarRol(Request $request){

        $data = $request->all();
        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".Auth::id().";")[0];
        echo($data["rol"]);
        echo($data["id_usuario"]);
        echo("UPDATE usuario SET tipo_usuario_id = ".$data["rol"]." WHERE id = ".$data["id_usuario"].";");
        DB::update("UPDATE usuario SET tipo_usuario_id = ".$data["rol"]." WHERE id = ".$data["id_usuario"].";");
        Session::flash('success', 'Rol cambiado con éxito');
        return redirect("/admin/$usuario->id");
    }

    public function cursos(){

        $cursos = DB::select("SELECT * FROM nivel;");

        return view('cursos', [

            'cursos' => $cursos,
         
        ]);

    }

    public function actualizarDatos(){

        $usuario = DB::select("SELECT * FROM usuario WHERE id = ".Auth::id().";")[0];

        return view("actualizarDatos",[

            'usuario' => $usuario,
        ]);
    }

    public function actualizandoDatos(Request $request){

        $datosInvalidos = false;

        if (strlen($request->nombres)<4){
            Session::flash('fail', 'El nombre no puede ser menor a 4 caracteres');
            $datosInvalidos = true;
        }

        if (strlen($request->nombres)>30){
            Session::flash('fail', 'El nombre debe tener como máximo 30 caracteres');
            $datosInvalidos = true;
        }

        if ($datosInvalidos) {
            return redirect("/perfil/actualizar" . "/". Auth::id());
        }

        $id = Auth::id();
        $usuario = User::findOrFail($id);
        $usuario->nombres = $request->get('nombres');
        $usuario->apellido_paterno = $request->get('apellido_paterno');
        $usuario->apellido_materno = $request->get('apellido_materno');
        $usuario->fecha_nacimiento = $request->get('fecha_nacimiento');
        $usuario->telefono = $request->get('telefono');
        $usuario->username = $request->get('username');
        $usuario->sexo = $request->get('sexo');
        
        $usuario->update();

        Session::flash('success', '¡Datos actualizados con éxito!');

        return redirect("/perfil/actualizar" . "/". Auth::id());
    }

    public function registroCurso(){

        $cursos = DB::select("SELECT * FROM nivel");
        $letras = DB::select("SELECT * FROM letra");
        $periodos = DB::select("SELECT * FROM periodo");
        $colegios = DB::select("SELECT * FROM colegio");

        return view("registrarCurso",[

            'cursos' => $cursos,
            'letras' => $letras,
            'periodos' => $periodos,
            'colegios' => $colegios,

        ]);

    }

    public function guardarCurso(Request $request){

        $data = $request->all();

        DB::update("INSERT INTO asigna_reim (letra_id, periodo_id, reim_id, colegio_id, nivel_id) VALUES (".$data["letra_id"].", ".$data["periodo_id"].", 905, ".$data["colegio_id"].", ".$data["nivel_id"].")");
        Session::flash('success', '¡Curso registrado con éxito!');
        return redirect("/registrarCurso");

    }

}


