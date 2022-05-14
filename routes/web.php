<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});

//Perfil

Route::get('/perfil/{id}', [App\Http\Controllers\UsersController::class, 'profile'])->middleware('auth');
Route::get('/perfil/{id}/{newAvatar}', [App\Http\Controllers\UsersController::class, 'editAvatar'])->middleware('auth');
Route::get('/editar/{id}', [App\Http\Controllers\UsersController::class, 'editProfile'])->middleware('auth');
Route::post('/editar/perfil/{id}', [App\Http\Controllers\UsersController::class, 'updateProfile'])->middleware('auth');

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/explorar/{id}', [App\Http\Controllers\UsersController::class, 'explore'])->middleware('auth');

Route::get('/actividad/{nombre}/{id}', [App\Http\Controllers\ActivitiesController::class, 'actividad']);

Route::get('/tienda/{id}', function () {
    return view('tienda');
});

Auth::routes();

//Authentication

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name("logout");
