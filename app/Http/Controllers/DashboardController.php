<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        // Calcul des statistiques
        $completedProjects = Project::where('status', 'completed')->count();
        $ongoingProjects = Project::where('status', 'ongoing')->count();
        $completedTasks = Task::where('status', 'completed')->count();
        $ongoingTasks = Task::where('status', 'in_progress')->count();

        // Retourne la vue avec les données
        return view('layouts.dashboard', compact('completedProjects', 'ongoingProjects', 'completedTasks', 'ongoingTasks'));
    }
}
