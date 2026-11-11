<?php

use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProntuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('pacientes', PacienteController::class);
    Route::resource('prontuarios', ProntuarioController::class);
    Route::resource('especialidades', EspecialidadeController::class);
    Route::resource('profissionais', ProfController::class)
        ->parameters(['profissionais' => 'profissional']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
