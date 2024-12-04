<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes Web
|--------------------------------------------------------------------------
*/

// Route par défaut qui redirige vers le tableau de bord
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Tableau de bord
Route::get('/layouts.dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routes nécessitant une authentification
Route::middleware('auth')->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes pour les projets
    Route::resource('projects', ProjectController::class);

    // Routes pour les tâches (si nécessaire, inclure un contrôleur de tâches)
   Route::resource('tasks', TaskController::class);
   Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');


   //Route pour afficher les users
   Route::resource('users', UserController::class)->except(['show', 'edit', 'update']);





   // Route spécifique pour mettre à jour le statut d'un projet
Route::patch('projects/{project}/status', [ProjectController::class, 'updateStatus'])->name('projects.updateStatus');



});

require __DIR__ . '/auth.php';
