<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
// ---------------------------------------------
// 🌍 RUTAS PÚBLICAS
// ---------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contacto', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contacto', [ContactController::class, 'send'])->name('contact.send');

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

    // Dentro del grupo admin
    Route::get('contact', [App\Http\Controllers\Admin\ContactController::class, 'edit'])->name('contact.edit');
    Route::put('contact', [App\Http\Controllers\Admin\ContactController::class, 'update'])->name('contact.update');
    Route::get('contact/messages', [App\Http\Controllers\Admin\ContactMessageController::class, 'index'])
    ->name('contact.messages');

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
// Envío del formulario desde home
Route::post('/', [HomeController::class, 'sendMessage'])->name('home.send');

// 🧭 AUTENTICACIÓN (Breeze / Fortify / Jetstream)
// ---------------------------------------------
require __DIR__.'/auth.php';
