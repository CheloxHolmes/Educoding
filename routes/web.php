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

Route::get('/editar/{id}', [App\Http\Controllers\UsersController::class, 'editProfile'])->middleware('auth');

Route::post('/editar/perfil/{id}', [App\Http\Controllers\UsersController::class, 'updateProfile'])->middleware('auth');

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

//Profesores

Route::get('/dashboard/{id}', [App\Http\Controllers\UsersController::class, 'dashboard'])->middleware('auth');

//Admin

Route::get('/admin/{id}', [App\Http\Controllers\UsersController::class, 'admin'])->middleware('auth');

Route::post('/admin/cambiar/rol', [App\Http\Controllers\UsersController::class, 'cambiarRol'])->middleware('auth');

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

Route::get('/actividadLenguaje', [App\Http\Controllers\ActivitiesController::class, 'actividadLenguaje'])->middleware('auth');

Route::get('/actividad/{id}/sumar', [App\Http\Controllers\ActivitiesController::class, 'sumarCoins'])->middleware('auth');

Auth::routes();

//Authentication

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)
        ->where('password', $request->password)
        ->first();
    if ($user) {
        //Auth::loginUsingId($user->id);
        //// -- OR -- //
        Auth::login($user);
        return redirect()->route('welcome');
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
