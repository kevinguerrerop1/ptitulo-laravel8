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
use App\Http\Controllers\VehiculosClientes;
use App\Http\Controllers\VehiculosClientesController;

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
//->middleware('auth')
//instruccion para logear ante cualquier cosa
//Route::get('/', function () {return view('auth.login');});
//Route::get('/',function(){return view('welcome');});

//Rutas Autentificacion
Auth::routes([ 'register' => false]);

//Ruta Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta Contacto
Route::get('/contacto', function () {return view('contacto');});

//Ruta Nosotros
Route::get('/about', function () {return view('about');});

Route::get('/adios', function () {return view('hola');});

//Ruta Empleados
Route::resource('empleados', EmpleadosController::class)->middleware('auth');

//Ruta Articulos
Route::resource('articulos', ArticulosController::class)->middleware('auth');

//Rutas Servicios
Route::resource('servicios', ServiciosController::class)->middleware('can:isAdmin');

//Ruta Tipo Servicios
Route::resource('tiposervicios', TipoServiciosController::class)->middleware('auth');

//Ruta Clientes
Route::resource('clientes', ClientesController::class)->middleware('auth');

//Ruta Vehiculos
Route::resource('vehiculos', VehiculosController::class)->middleware('auth');

//Ruta Admin
Route::resource('admin',AdministradoresController::class)->middleware('auth');

//Ruta Post
Route::resource('post',PostsController::class)->middleware('auth');

//Ruta Users
Route::resource('users', UsersController::class)->middleware('auth');

//Ruta Roles
Route::resource('roles',RolesController::class)->middleware('role:admin');

//Ruta vehiculos clientes
Route::resource('vehiculosclientes',VehiculosClientesController::class)->middleware('auth');