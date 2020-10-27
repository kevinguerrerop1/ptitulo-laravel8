<?php

use App\Http\Controllers\ArticulosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;


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



//Ruta para tomar todos los metodos
Route::resource('empleados', EmpleadosController::class);



Route::resource('articulos', ArticulosController::class);




Auth::routes(['reset' => false, 'register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
