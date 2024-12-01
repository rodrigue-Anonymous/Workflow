<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les projets de l'utilisateur connecté
        $userId = auth()->id();

        // Projets complétés et en cours
        $completedProjects = Project::where('user_id', $userId)->where('status', 'completed')->count();
        $ongoingProjects = Project::where('user_id', $userId)->where('status', 'ongoing')->count();

        // Tâches complétées et en cours
        $completedTasks = Task::where('assigned_to', $userId)->where('status', 'completed')->count();
        $ongoingTasks = Task::where('assigned_to', $userId)->where('status', 'in_progress')->count();

        return view('layouts.dashboard', compact(
            'completedProjects', 
            'ongoingProjects', 
            'completedTasks', 
            'ongoingTasks'
        ));
    }
}
