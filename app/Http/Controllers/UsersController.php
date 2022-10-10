<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Mensaje;
use App\Models\Pertenece;
use Illuminate\Http\UploadedFile;

class UsersController extends Controller
{
    public function profile($id)
    {

        $usuario = DB::select("SELECT * FROM usuario WHERE id = " . $id . ";")[0];
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '" . $usuario->email . "';")[0];
        $coins = DB::select("SELECT cantidad FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = '" . $usuario->id . "';")[0];
        $rol = DB::select("SELECT nombre FROM tipo_usuario WHERE id = '" . $usuario->tipo_usuario_id . "';")[0];
        $insignias = DB::select("SELECT * FROM inventario_reim INNER JOIN elemento on inventario_reim.id_elemento = elemento.id INNER JOIN imagen on inventario_reim.id_elemento = imagen.id_elemento WHERE sesion_id = " . $usuario->id . " AND elemento.nombre LIKE 'Insignia%';");
        $items = DB::select("SELECT * FROM inventario_reim INNER JOIN elemento on inventario_reim.id_elemento = elemento.id INNER JOIN imagen on inventario_reim.id_elemento = imagen.id_elemento WHERE sesion_id = " . $usuario->id . " AND elemento.id BETWEEN 400 AND 417;");
        $cantidadInsignias = count($insignias);
        $modulosCompletados = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 500 AND sesion_id = " . $usuario->id . ";")[0];

        $avatarImagen = DB::select("SELECT idimagen, nombre, descripcion, CONVERT(imagen using utf8) AS imagen FROM imagen WHERE nombre LIKE 'AV".$usuario->id."%' ORDER BY idimagen DESC;");
        if (count($avatarImagen)>0) {
            $avatarImagen = $avatarImagen[0]->imagen;
            //return $avatarImagen;
        }
        else {
            $avatarImagen = "";
        }

        return view('perfil', [

            'usuario' => $usuario,
            'avatar' => $imagen->descripcion,
            'coins' => $coins,
            'rol' => $rol,
            'insignias' => $insignias,
            'items' => $items,
            'avatarImagen' => $avatarImagen,
            'modulosCompletados' => $modulosCompletados->cantidad,

        ]);
    }

    public function dashboard($id)
    {
        $usuario = DB::select("SELECT * FROM usuario WHERE id = " . $id . ";")[0];
        $alumnos = DB::select("SELECT * FROM usuario INNER JOIN asigna_reim_alumno ON usuario.id = asigna_reim_alumno.usuario_id WHERE tipo_usuario_id = 3 AND reim_id = 905;")[0];
        $cAlumnos = DB::select("SELECT * FROM usuario INNER JOIN asigna_reim_alumno ON usuario.id = asigna_reim_alumno.usuario_id WHERE tipo_usuario_id = 3 AND reim_id = 905;");
        $inventarioAlumno = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = '".$alumnos->id."';")[0];
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '" . $usuario->email . "';")[0];
        $sumaModulos = DB::select("SELECT SUM(cantidad) AS 'suma' FROM inventario_reim WHERE id_elemento = 500;")[0]->suma;
        //$mensajes = Mensaje::where('id_receptor', Auth::id())->get();
        $mensajes = DB::select("SELECT mensajes.id AS 'id_mensaje', titulo, descripcion, fecha_mensaje, id_creador, nombres, apellido_paterno FROM mensajes INNER JOIN usuario ON usuario.id = mensajes.id_creador ORDER BY fecha_mensaje DESC LIMIT 4;");
        $countMensajes = count($mensajes);
        $todoUsuarios = User::all();
        $actividades = DB::select("SELECT * FROM actividad WHERE id IN (21,22,23,24);");

        $cant = count($cAlumnos);
        $sumaCoins = 0;
        for ($i = 0; $i < $cant; ++$i) {
            $sumaCoins = $inventarioAlumno->cantidad + $sumaCoins;
        }

        $cantidadesModulosCompletadosMes = array();
        $cantidadesModulosCorrectosMes = array();
        $cantidadesModulosIncorrectosMes = array();
        $fechasMes = array();

        $respuestas_mes = DB::select("SELECT id_per, id_actividad, datetime_touch, DAY(datetime_touch) AS 'n_dia', MONTH(datetime_touch) AS 'n_mes', YEAR(datetime_touch) AS 'n_anno', correcta FROM alumno_respuesta_actividad WHERE id_actividad != 4 AND id_actividad != 24 AND MONTH(datetime_touch) = MONTH(CURRENT_DATE()) AND YEAR(datetime_touch) = YEAR(CURRENT_DATE())");
        $diasMes = Carbon::now()->daysInMonth;

        for ($i = 0; $i < $diasMes; ++$i) {

            $completados = 0;
            $correctos = 0;
            $incorrectos = 0;

            $fecha_recorrido = date_format( date_create( Carbon::now()->year . '-' . Carbon::now()->month . '-' . strval($i+1)), 'Y-M-d'  );

            array_push($fechasMes, strval($fecha_recorrido));

            for ($k = 0; $k < count($respuestas_mes); ++$k) {
                $fecha_res = date_format(date_create( $respuestas_mes[$k]->n_anno . '-' . $respuestas_mes[$k]->n_mes . '-' . $respuestas_mes[$k]->n_dia ), 'Y-M-d');

                if ($fecha_recorrido == $fecha_res) {
                    $completados += 1;

                    if ($respuestas_mes[$k]->correcta == 1) {
                        $correctos += 1;
                    }
                    else {
                        $incorrectos += 1;
                    }
                }
            }

            array_push($cantidadesModulosCompletadosMes, $completados);
            array_push($cantidadesModulosCorrectosMes, $correctos);
            array_push($cantidadesModulosIncorrectosMes, $incorrectos);

        }    

        return view('dashboard', [

            'alumnos' => $cAlumnos,
            'cant' => $cant,
            'usuario' => $usuario,
            'avatar' => $imagen->descripcion,
            'sumaCoins' => $sumaCoins,
            'sumaModulos' => $sumaModulos,
            'cantidadesModulosCompletadosMes' => $cantidadesModulosCompletadosMes,
            'cantidadesModulosCorrectosMes' => $cantidadesModulosCorrectosMes,
            'cantidadesModulosIncorrectosMes' => $cantidadesModulosIncorrectosMes,
            'fechasMes' => $fechasMes,
            'mensajes' => $mensajes,
            'todosUsuarios' => $todoUsuarios,
            'countMensajes' => $countMensajes,
            'actividades' => $actividades,
            'respuestas_mes' => $respuestas_mes,
            'diasMes' => $diasMes,

        ]);
    }

    public function explore($id)
    {

        $usuario = DB::select("SELECT * FROM usuario WHERE id = " . $id . ";")[0];
        $imagen = DB::select("SELECT * FROM imagen WHERE nombre = '" . $usuario->email . "';")[0];
        $coins = DB::select("SELECT cantidad FROM inventario_reim WHERE id_elemento = 900 AND sesion_id = '" . $usuario->id . "';")[0];
        $modulosCompletados = DB::select("SELECT * FROM inventario_reim WHERE id_elemento = 500 AND sesion_id = " . $usuario->id . ";")[0];

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

    public function editAvatar($newAvatar)
    {
        $usuario = DB::select("SELECT * FROM usuario WHERE id = " . Auth::id() . ";")[0];
        DB::select("UPDATE imagen SET descripcion = '" . $newAvatar . "' WHERE nombre = '" . $usuario->email . "';");
        return redirect("/perfil/$usuario->id");
    }

    public function admin($id)
    {

        $usuario = DB::select("SELECT * FROM usuario WHERE id = " . $id . ";")[0];
        $admin = DB::select("SELECT * FROM usuario WHERE tipo_usuario_id = 1;")[0];
        $allUsers = DB::select("SELECT usuario.id, tipo_usuario_id, tipo_usuario.nombre, usuario.nombres, usuario.email FROM usuario INNER JOIN tipo_usuario on usuario.tipo_usuario_id = tipo_usuario.id;");

        return view('admin', [

            'admin' => $admin,
            'usuario' => $usuario,
            'allUsers' => $allUsers,
        ]);
    }

    public function cambiarRol(Request $request)
    {

        $data = $request->all();
        $usuario = DB::select("SELECT * FROM usuario WHERE id = " . Auth::id() . ";")[0];
        echo ($data["rol"]);
        echo ($data["id_usuario"]);
        echo ("UPDATE usuario SET tipo_usuario_id = " . $data["rol"] . " WHERE id = " . $data["id_usuario"] . ";");
        DB::update("UPDATE usuario SET tipo_usuario_id = " . $data["rol"] . " WHERE id = " . $data["id_usuario"] . ";");
        Session::flash('success', 'Rol cambiado con éxito');
        return redirect("/admin/$usuario->id");
    }

    public function cursos()
    {

        $cursos = DB::select("SELECT * FROM nivel;");

        return view('cursos', [

            'cursos' => $cursos,

        ]);
    }

    public function actualizarDatos()
    {

        $usuario = DB::select("SELECT * FROM usuario WHERE id = " . Auth::id() . ";")[0];

        return view("actualizarDatos", [

            'usuario' => $usuario,
        ]);
    }

    public function actualizandoDatos(Request $request)
    {

        $datosInvalidos = false;

        if (strlen($request->nombres) < 4) {
            Session::flash('fail', 'El nombre no puede ser menor a 4 caracteres');
            $datosInvalidos = true;
        }

        if (strlen($request->nombres) > 30) {
            Session::flash('fail', 'El nombre debe tener como máximo 30 caracteres');
            $datosInvalidos = true;
        }

        if ($datosInvalidos) {
            return redirect("/perfil/actualizar" . "/" . Auth::id());
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

        return redirect("/perfil/actualizar" . "/" . Auth::id());
    }

    public function registroCurso()
    {

        $cursos = DB::select("SELECT * FROM nivel");
        $letras = DB::select("SELECT * FROM letra");
        $periodos = DB::select("SELECT * FROM periodo");
        $colegios = DB::select("SELECT * FROM colegio");

        return view("registrarCurso", [

            'cursos' => $cursos,
            'letras' => $letras,
            'periodos' => $periodos,
            'colegios' => $colegios,

        ]);
    }

    public function guardarCurso(Request $request)
    {

        $data = $request->all();

        DB::update("INSERT INTO asigna_reim (letra_id, periodo_id, reim_id, colegio_id, nivel_id) VALUES (" . $data["letra_id"] . ", " . $data["periodo_id"] . ", 905, " . $data["colegio_id"] . ", " . $data["nivel_id"] . ")");
        Session::flash('success', '¡Curso registrado con éxito!');
        return redirect("/registrarCurso");
    }

    public function registroAlumno()
    {

        $cursos = DB::select("SELECT * FROM nivel");
        $letras = DB::select("SELECT * FROM letra");
        $colegios = DB::select("SELECT * FROM colegio");
        $alumnos = DB::select("SELECT * FROM usuario WHERE tipo_usuario_id = 3;");
        $fecha = Carbon::now();

        return view("registrarAlumno", [

            'cursos' => $cursos,
            'letras' => $letras,
            'colegios' => $colegios,
            'alumnos' => $alumnos,
            'fecha' => $fecha,

        ]);
    }

    public function guardarAlumno(Request $request)
    {


        $post = Pertenece::create([

            'fecha' => Carbon::now(),
            'usuario_id' => $request->usuario_id,
            'colegio_id' => $request->colegio_id,
            'nivel_id' => $request->nivel_id,
            'letra_id' => $request->letra_id,

        ]);

        Session::flash('success', '¡Alumno registrado con éxito!');
        return redirect("/registrarAlumno");

    }

    public function nuevoAvatar(Request $request) {

        $unaimagen = DB::select("SELECT idimagen FROM imagen ORDER BY idimagen DESC LIMIT 1;")[0]->idimagen;


        if ($request->file('avatar')) {
            //$base64Image = explode(";base64,", $request->file('avatar'));
            //$explodeImage = explode("image/", $base64Image[0]);
            //$imageName = $explodeImage[1];
            //$image_base64 = base64_decode($base64Image[1]);
            //$file = $folderPath . uniqid() . '. '.$imageName;
        }

        //$path = $request->file('avatar')->store('avatar');

        $image_base64 = base64_encode(file_get_contents($request->file('avatar')));
        $imagen_mas = intval($unaimagen)+1;

        DB::delete("DELETE FROM imagen WHERE nombre LIKE '%AV".Auth::id()."%';");
        DB::insert("INSERT INTO imagen (idimagen, nombre, imagen, id_elemento, descripcion) VALUES (".$imagen_mas.", 'AV".Auth::id()."', '".$image_base64."', 101, 'AVATAR');");

        Session::flash('success', '¡Alumno registrado con éxito!');
        return redirect()->back();
    }

    public function educoding()
    {

        return view("educoding", [

          
        ]);
    }
}
