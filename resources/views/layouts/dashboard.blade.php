@extends('layouts.master_dash')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Tableau de Bord</h1>

    <!-- Statistiques -->
    <div class="row text-center">
        <!-- Projets Complétés -->
        <div class="col-md-3">
            <div class="card" style="border-radius: 15px; background-color: #28a745; color: white;">
                <div class="card-body">
                    <h5 class="card-title">Projets Complétés</h5>
                    <p class="card-text" style="font-size: 2rem; font-weight: bold;">{{ $completedProjects }}</p>
                </div>
            </div>
        </div>

        <!-- Projets En Cours -->
        <div class="col-md-3">
            <div class="card" style="border-radius: 15px; background-color: #ffc107; color: white;">
                <div class="card-body">
                    <h5 class="card-title">Projets En Cours</h5>
                    <p class="card-text" style="font-size: 2rem; font-weight: bold;">{{ $ongoingProjects }}</p>
                </div>
            </div>
        </div>

        <!-- Tâches Complétées -->
        <div class="col-md-3">
            <div class="card" style="border-radius: 15px; background-color: #17a2b8; color: white;">
                <div class="card-body">
                    <h5 class="card-title">Tâches Complétées</h5>
                    <p class="card-text" style="font-size: 2rem; font-weight: bold;">{{ $completedTasks }}</p>
                </div>
            </div>
        </div>

        <!-- Tâches En Cours -->
        <div class="col-md-3">
            <div class="card" style="border-radius: 15px; background-color: #dc3545; color: white;">
                <div class="card-body">
                    <h5 class="card-title">Tâches En Cours</h5>
                    <p class="card-text" style="font-size: 2rem; font-weight: bold;">{{ $ongoingTasks }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton Assigner une Tâche -->
    <div class="text-center mt-4">
      <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-lg" style="border-radius: 10px;">Assigner une Tâche</a>
    </div>
</div>

<!-- CSS pour embellir les cartes -->
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection
