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
use App\Http\Controllers\VehiculosClientesController;
use App\Http\Controllers\ChartController;


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

//Ruta Empleados
Route::resource('empleados', EmpleadosController::class)->middleware('role:admin');

//Ruta Articulos
Route::resource('articulos', ArticulosController::class)->middleware('auth');

//Rutas Servicios
Route::resource('servicios', ServiciosController::class)->middleware('role:admin,empleado');

//Ruta Tipo Servicios
Route::resource('tiposervicios', TipoServiciosController::class)->middleware('auth');

//Ruta Clientes
Route::resource('clientes', ClientesController::class)->middleware('role:admin');

//Ruta Vehiculos
Route::resource('vehiculos', VehiculosController::class)->middleware('role:admin,cliente,empleado');

//Ruta Admin
Route::resource('admin',AdministradoresController::class)->middleware('auth');

//Ruta Post
Route::resource('post',PostsController::class)->middleware('role:admin');

//Ruta Users
Route::resource('users', UsersController::class)->middleware('role:admin');

//Ruta Roles
Route::resource('roles',RolesController::class)->middleware('role:admin');

//Ruta vehiculos clientes
Route::resource('vehiculosclientes',VehiculosClientesController::class)->middleware('role:admin');

//Ruta Charts -> Grafico
Route::resource('chart',ChartController::class);