<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TipoServiciosController;
use App\Http\Controllers\VehiculosController;

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
    return view('auth.login');
});

//->middleware('auth')
//instruccion para log ante cualquier cosa

//Ruta para tomar todos los metodos
Route::resource('empleados', EmpleadosController::class)->middleware('auth');
Route::resource('articulos', ArticulosController::class)->middleware('auth');

//Rutas Servicios
Route::resource('servicios', ServiciosController::class)->middleware('auth');
Route::resource('tiposervicios', TipoServiciosController::class)->middleware('auth');
Route::resource('clientes', ClientesController::class);
Route::resource('vehiculos', VehiculosController::class);


Auth::routes([ 'register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
