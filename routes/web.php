<?php

use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProntuarioController;
use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/agenda/criar', [AgendaController::class, 'create'])->name('agenda.create');
    
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
