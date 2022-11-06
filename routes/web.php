<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Perfil

Route::get('/perfil/{id}', [App\Http\Controllers\UsersController::class, 'profile'])->middleware('auth');

Route::get('/perfil/avatar/{newAvatar}', [App\Http\Controllers\UsersController::class, 'editAvatar'])->middleware('auth');

Route::get('/perfil/actualizar/{id}', [App\Http\Controllers\UsersController::class, 'actualizarDatos'])->middleware('auth');

Route::post('/perfil/actualizardatos', [App\Http\Controllers\UsersController::class, 'actualizandoDatos'])->middleware('auth');

Route::get('/editar/{id}', [App\Http\Controllers\UsersController::class, 'editProfile'])->middleware('auth');

Route::post('/perfil/avatar', [App\Http\Controllers\UsersController::class, 'nuevoAvatar'])->middleware('auth');

//Contacto

Route::get('/contacto', function () {
    return view('contacto');
});

//About

Route::get('/about', function () {
    return view('about');
});

//Colegios

Route::get('/colegios', [App\Http\Controllers\ColegiosController::class, 'colegios'])->middleware('auth');

//Educoding

Route::get('/educoding', [App\Http\Controllers\UsersController::class, 'educoding'])->middleware('auth')->name('educoding');

//Profesores

Route::get('/dashboard/{id}', [App\Http\Controllers\UsersController::class, 'dashboard'])->middleware('auth');

Route::get('/cursos', [App\Http\Controllers\UsersController::class, 'cursos'])->middleware('auth');

Route::get('/ListaAlumnos', [App\Http\Controllers\UsersController::class, 'listaAlumnos'])->middleware('auth');

Route::get('/ListaCursos', [App\Http\Controllers\UsersController::class, 'listaCursos'])->middleware('auth');

Route::get('/EstadisticaAlumno/{id}', [App\Http\Controllers\UsersController::class, 'estadisticaAlumno'])->middleware('auth');

Route::get('/EstadisticaCurso/{idcolegio}/{idcurso}/{idletra}', [App\Http\Controllers\UsersController::class, 'estadisticaCurso'])->middleware('auth');

Route::get('/EstadisticaGeneral', [App\Http\Controllers\UsersController::class, 'estadisticaGeneral'])->middleware('auth');

Route::get('/ayuda', [App\Http\Controllers\UsersController::class, 'ayuda'])->middleware('auth');

//Admin

Route::get('/admin/{id}', [App\Http\Controllers\UsersController::class, 'admin'])->middleware('auth');

Route::post('/admin/cambiar/rol', [App\Http\Controllers\UsersController::class, 'cambiarRol'])->middleware('auth');

Route::get('/registrarCurso', [App\Http\Controllers\UsersController::class, 'registroCurso'])->middleware('auth');

Route::post('/registrar/curso', [App\Http\Controllers\UsersController::class, 'guardarCurso'])->middleware('auth');

Route::get('/registrarAlumno', [App\Http\Controllers\UsersController::class, 'registroAlumno'])->middleware('auth');

Route::post('/registrar/alumno', [App\Http\Controllers\UsersController::class, 'guardarAlumno'])->middleware('auth');

//Mensajes

Route::get('/mensajes/{id}', [App\Http\Controllers\MensajesController::class, 'VerMensajes'])->middleware('auth');

Route::get('/crearMensaje/{id}', [App\Http\Controllers\MensajesController::class, 'crearMensaje'])->middleware('auth');

Route::post('/mensaje/crear', [App\Http\Controllers\MensajesController::class, 'guardarMensaje'])->middleware('auth');

//Insignias

Route::get('/insignias', [App\Http\Controllers\InsigniasController::class, 'insignias'])->middleware('auth');

Route::get('/EnviarInsignia', [App\Http\Controllers\InsigniasController::class, 'listaAlumnos'])->middleware('auth');

Route::post('/insignia/asignar/alumno', [App\Http\Controllers\InsigniasController::class, 'enviarInsignia'])->middleware('auth');

Route::get('/insignias/asignacion/eliminar/{idalumno}/{idinsignia}', [App\Http\Controllers\InsigniasController::class, 'eliminarInsignia'])->middleware('auth');

//Tienda

Route::get('/tienda', [App\Http\Controllers\TiendaController::class, 'tienda'])->middleware('auth');

Route::get('/tienda/comprar/{idelemento}', [App\Http\Controllers\TiendaController::class, 'comprar'])->middleware('auth');

//Actividades

Route::get('/explorar/{id}', [App\Http\Controllers\UsersController::class, 'explore'])->middleware('auth');

Route::get('/actividad/{id}', [App\Http\Controllers\ActivitiesController::class, 'actividad'])->middleware('auth');

Route::get('/actividadLenguaje/{id}', [App\Http\Controllers\ActivitiesController::class, 'actividadLenguaje'])->middleware('auth');

Route::post('/actividad/dibujo/respuesta/{idUsuario}/{idAct}', [App\Http\Controllers\ActivitiesController::class, 'agregarRespuesta'])->middleware('auth');

Route::get('/actividad/{id}/sumar/{correcta}', [App\Http\Controllers\ActivitiesController::class, 'sumarCoins'])->middleware('auth');

Route::get('/actividad/respuestas/{idAct}', [App\Http\Controllers\ActivitiesController::class, 'respuestas'])->middleware('auth');

Auth::routes();

//Authentication

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::post('/login', function (Request $request) {
    $user = User::where('username', $request->username)
        ->where('password', $request->password)
        ->first();
    if ($user) {
        //Auth::loginUsingId($user->id);
        //// -- OR -- //
        Auth::login($user);
        if ($user->tipo_usuario_id == 3) {
            return redirect()->route('educoding');
        } else {
            return redirect()->route('welcome');
        }
    } else {
        return redirect()->back()->withInput();
    }
})->name("login");

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name("logout");
