<?php

namespace App\Http\Controllers;

use App\Mail\TaskAssigned;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Affiche toutes les tâches.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer toutes les tâches liées aux projets de l'utilisateur connecté
        $tasks = Task::whereHas('project', function ($query) {
            $query->where('user_id', auth()->id());
        })->with('project')->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle tâche.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Récupère tous les projets disponibles pour l'utilisateur connecté
        $projects = Project::where('user_id', auth()->id())->get();

        return view('tasks.create', compact('projects'));
    }

    /**
     * Stocke une nouvelle tâche dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
            'status' => 'required|in:not_started,in_progress,completed',
            'priority' => 'required|in:low,medium,high',
            'assigned_to' => 'required|email|exists:users,email',
        ]);
    
        // Récupérer l'utilisateur assigné
        $user = \App\Models\User::where('email', $request->assigned_to)->first();
    
        // Créer la tâche
        $task = Task::create([
            'project_id' => $request->project_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'assigned_to' => $user->id, // Sauvegarde l'ID de l'utilisateur assigné
        ]);
    
        // Envoie un email à l'utilisateur assigné
        \Mail::to($user->email)->send(new TaskAssigned($task));
    
        return redirect()->route('projects.index')->with('success', 'Tâche créée et assignée avec succès.');
    }
    
    

    /**
     * Affiche les détails d'une tâche.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\View\View
     */
    public function show(Task $task)
    {
        // Vérification d'accès : assure que l'utilisateur est propriétaire du projet de la tâche
        if ($task->project->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        return view('tasks.show', compact('task'));
    }

    /**
     * Affiche le formulaire pour modifier une tâche existante.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\View\View
     */
    public function edit(Task $task)
    {
        // Vérification d'accès
        if ($task->project->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        // Récupère tous les projets disponibles pour l'utilisateur connecté
        $projects = Project::where('user_id', auth()->id())->get();

        return view('tasks.edit', compact('task', 'projects'));
    }

    /**
     * Met à jour une tâche existante dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Task $task)
    {
        // Vérification d'accès
        if ($task->project->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
            'status' => 'required|in:not_started,in_progress,completed',
            'priority' => 'required|in:low,medium,high',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    /**
     * Supprime une tâche existante de la base de données.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task)
    {
        // Vérification d'accès
        if ($task->project->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
