<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProntuarioController;
use App\Http\Controllers\ProfController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('pacientes', PacienteController::class);

Route::resource('prontuarios', ProntuarioController::class);

Route::resource('profissionais', ProfController::class);