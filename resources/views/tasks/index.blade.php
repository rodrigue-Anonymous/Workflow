@extends('layouts.master_dash')

@section('title', 'Liste des Tâches')

@section('content')
<div class="container">
    <h1>Liste des Tâches</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Ajouter une Tâche</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Priorité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    @switch($task->status)
                        @case('not_started')
                            Non commencé
                            @break
                        @case('in_progress')
                            En cours
                            @break
                        @case('completed')
                            Terminé
                            @break
                    @endswitch
                </td>
                <td>
                    @switch($task->priority)
                        @case('low')
                            Basse
                            @break
                        @case('medium')
                            Moyenne
                            @break
                        @case('high')
                            Haute
                            @break
                    @endswitch
                </td>
                <td>
                    <!-- Bouton Modifier -->
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Modifier</a>

                    <!-- Bouton Supprimer -->
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>

                    <!-- Bouton Voir plus -->
                    <a href="{{ route('tasks.show', $task) }}" class="btn btn-info">Voir plus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
