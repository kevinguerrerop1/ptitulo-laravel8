<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TipoServiciosController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;

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

//Route::get('/', function () {return view('auth.login');});
//Route::get('/',function(){return view('welcome');});
Route::get('/contacto', function () {return view('contacto');});
Route::get('/about', function () {return view('about');});
//->middleware('auth')
//instruccion para logear ante cualquier cosa

//Ruta para tomar todos los metodos
Route::resource('empleados', EmpleadosController::class);
Route::resource('articulos', ArticulosController::class);

//Rutas Servicios
Route::resource('servicios', ServiciosController::class);
Route::resource('tiposervicios', TipoServiciosController::class);
Route::resource('clientes', ClientesController::class);
Route::resource('vehiculos', VehiculosController::class);


Auth::routes([ 'register' => true]);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('admin',AdministradoresController::class);
Route::resource('post',PostsController::class)->middleware('auth');

//Ruta Users
Route::resource('users', UsersController::class);

//Ruta Roles
Route::resource('roles',RolesController::class);