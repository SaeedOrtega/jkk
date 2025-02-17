<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\ResultadoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('laboratorios', LaboratorioController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('examenes', ExamenController::class);
Route::resource('resultados', ResultadoController::class);