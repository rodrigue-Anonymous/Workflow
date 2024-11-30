<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // public function index()
    // {
    //     // Liste des projets de l'utilisateur connecté
    //     return auth()->user()->projects;
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'deadline' => 'required|date',
    //     ]);

    //     $project = auth()->user()->projects()->create($validated);

    //     return response()->json($project, 201);
    // }

    // public function show(Project $project)
    // {
    //     $this->authorize('view', $project);
    //     return $project;
    // }

    // public function update(Request $request, Project $project)
    // {
    //     $this->authorize('update', $project);

    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'deadline' => 'required|date',
    //         'status' => 'in:ongoing,completed',
    //     ]);

    //     $project->update($validated);

    //     return response()->json($project);
    // }

    // public function destroy(Project $project)
    // {
    //     $this->authorize('delete', $project);

    //     $project->delete();

    //     return response()->json(['message' => 'Project deleted successfully']);
    // }





public function index()
{
    $projects = Project::where('user_id', auth()->id())->get();
    return view('projects.index', compact('projects'));
}


public function create()
{
    $projects = Project::where('user_id', auth()->id())->get();
    return view('tasks.create', compact('projects'));
}

public function store(Request $request)
{
    $request->validate(['name' => 'required|string|max:255']);
    Project::create([
        'name' => $request->name,
        'user_id' => auth()->id(),
    ]);
    return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
}

public function edit(Project $project)
{
    $this->authorize('update', $project);
    return view('projects.edit', compact('project'));
}

public function update(Request $request, Project $project)
{
    $this->authorize('update', $project);
    $request->validate(['name' => 'required|string|max:255']);
    $project->update(['name' => $request->name]);
    return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès.');
}

public function destroy(Project $project)
{
    $this->authorize('delete', $project);
    $project->delete();
    return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès.');
}
}