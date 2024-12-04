<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Assurez-vous d'importer ce trait

class ProjectController extends Controller
{
    use AuthorizesRequests; // Assurez-vous d'utiliser ce trait

    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->get(); // Projets de l'utilisateur connecté
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
            'deadline' => 'required|date',
        ]);

        Project::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project); // Vérification des autorisations
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project); // Vérification des autorisations

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
            'deadline' => 'required|date',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour.');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project); // Vérification des autorisations
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Projet supprimé.');
    }

    // Affichage du détail du projet avec ses tâches
    public function show(Project $project)
    {
        // Vérifie si l'utilisateur connecté est bien le propriétaire du projet
        if ($project->user_id !== auth()->id()) {
            // Si ce n'est pas le cas, redirige l'utilisateur ou renvoie une erreur
            return redirect()->route('projects.index')->with('error', 'Vous n\'êtes pas autorisé à voir ce projet.');
        }

        // Récupère les tâches liées à ce projet
        $tasks = $project->tasks; // Relation définie dans le modèle Project

        return view('projects.show', compact('project', 'tasks'));
    }




    public function updateStatus(Request $request, Project $project)
    {
        // Vérifier si l'utilisateur est autorisé à modifier ce projet
        $this->authorize('update', $project);

        // Valider que le statut est l'une des valeurs autorisées
        $request->validate([
            'status' => ['required', 'in:ongoing,completed'], // Validation pour les statuts
        ]);

        // Mettre à jour le statut du projet
        $project->update([
            'status' => $request->status,
        ]);

        // Redirection avec un message de confirmation
        return redirect()->route('projects.index')->with('success', 'Le statut du projet a été mis à jour.');
    }


}
