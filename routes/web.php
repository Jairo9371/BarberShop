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

//Barberos
Route::resource('/barberos', 'App\Http\Controllers\BarberoController');

//Citas
Route::resource('/citas', 'App\Http\Controllers\CitaController');

//Clientes

Route::resource('/clientes', 'App\Http\Controllers\ClienteController');

//Detalle Citas

Route::resource('/detallecitas', 'App\Http\Controllers\DetalleCitaController');


//Horarios
Route::resource('/horarios', 'App\Http\Controllers\HorarioController');



//Tarifas
Route::resource('/tarifas', 'App\Http\Controllers\TarifaController');

//Gastos
Route::resource('/gastos', 'App\Http\Controllers\GastoController');

//Pagos
Route::resource('/pagos', 'App\Http\Controllers\PagoController');

//Ganancias
Route::resource('/ganancias', 'App\Http\Controllers\GananciaController');






