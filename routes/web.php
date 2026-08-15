<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AuthController;

Route::redirect('/', '/proyectos');

// Rutas Públicas (Huésped)
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});

// Rutas Protegidas (Autenticado)
Route::middleware(['auth'])->group(function () {
    Route::get('proyectos/{proyecto}/eliminar', [ProyectoController::class, 'deleteConfirm'])->name('proyectos.delete');
    Route::resource('proyectos', ProyectoController::class);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
