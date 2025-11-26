<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Página de inicio (Welcome)
Route::get('/', function () {
    return view('welcome');
});

// --- TUS NUEVAS RUTAS ---

// Ruta para ver la página de destinos
Route::get('/reservaciones', function () {
    return view('reservaciones'); // Busca resources/views/reservaciones.blade.php
})->name('reservaciones');

// Ruta para el formulario (necesaria porque el JS redirige aquí)
Route::get('/formulario', function () {
    // Asegúrate de crear el archivo resources/views/formulario.blade.php
    // Si aún no lo tienes, dará error al hacer clic en un destino.
    return view('formulario'); 
})->name('formulario');

// ------------------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
