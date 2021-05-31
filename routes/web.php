<?php

use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\EstudiosController;
use App\Http\Controllers\EstudiosDetallesController;
use App\Http\Controllers\PacientesController;
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
Route::resource('pacientes',PacientesController::class);
Route::resource('estudios', EstudiosController::class);
Route::resource('consultas',ConsultasController::class);
Route::resource('estudios_detalles',EstudiosDetallesController::class);
