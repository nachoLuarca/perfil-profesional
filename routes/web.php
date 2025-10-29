<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;

// ---------------------------------------------
// 🌍 RUTAS PÚBLICAS
// ---------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');

// ---------------------------------------------
// 🔐 RUTAS DEL PANEL DE ADMINISTRACIÓN
// Solo para usuarios autenticados
// ---------------------------------------------
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard principal del administrador
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // CRUD de proyectos
    Route::resource('projects', ProjectController::class);

    // CRUD de habilidades
    Route::resource('skills', SkillController::class);

    // Perfil profesional (UserController en namespace Admin)
    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
});

// ---------------------------------------------
// 👤 RUTAS DE PERFIL PERSONAL (AUTENTICADO)
// ---------------------------------------------
Route::middleware('auth')->group(function () {

    // Editar perfil de cuenta (nombre, email, contraseña, etc.)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ---------------------------------------------
// 🧭 AUTENTICACIÓN (Breeze / Fortify / Jetstream)
// ---------------------------------------------
require __DIR__.'/auth.php';
