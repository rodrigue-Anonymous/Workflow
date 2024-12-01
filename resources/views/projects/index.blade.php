@extends('layouts.master_dash')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1>Liste des Projets</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Ajouter un Projet</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Date Limite</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->deadline }}</td>
                <td>
                    <!-- Vérification de l'autorisation avant d'afficher le bouton de modification -->
                    @can('update', $project)
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Modifier</a>
                    @endcan

                    <!-- Vérification de l'autorisation avant d'afficher le bouton de suppression -->
                    @can('delete', $project)
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    @endcan

                    <!-- Bouton Voir plus pour afficher les détails du projet -->
                    <a href="{{ route('projects.show', $project) }}" class="btn btn-info">Voir plus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
