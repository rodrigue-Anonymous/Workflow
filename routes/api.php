<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;

Route::middleware(['auth:sanctum'])->group(function () {
    // Routes  API pour les projets
    Route::apiResource('projects', ProjectController::class);

    // Routes pour les tâches
    Route::apiResource('tasks', TaskController::class);
});
