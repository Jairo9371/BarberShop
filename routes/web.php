<?php

use Illuminate\Support\Facades\Route;

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

//Inicio

Route::resource('/inicio', 'App\Http\Controllers\InicioController')->middleware('auth');


//Barberos
Route::resource('/barberos', 'App\Http\Controllers\BarberoController')->middleware('auth');

//Citas
Route::resource('/citas', 'App\Http\Controllers\CitaController')->middleware('auth');

//Clientes

Route::resource('/clientes', 'App\Http\Controllers\ClienteController')->middleware('auth');

//Detalle Citas

Route::resource('/detallecitas', 'App\Http\Controllers\DetalleCitaController')->middleware('auth');


//Horarios
Route::resource('/horarios', 'App\Http\Controllers\HorarioController')->middleware('auth');



//Tarifas
Route::resource('/tarifas', 'App\Http\Controllers\TarifaController')->middleware('auth');

//Gastos
Route::resource('/gastos', 'App\Http\Controllers\GastoController')->middleware('auth');

//Pagos
Route::resource('/pagos', 'App\Http\Controllers\PagoController')->middleware('auth');

//Ganancias
Route::resource('/ganancias', 'App\Http\Controllers\GananciaController')->middleware('auth');







Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
