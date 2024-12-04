<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Détails de la Tâche" name="description">
    <meta content="Faciloyer" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Détails de la Tâche</title>

    <!-- CSS pour la page -->
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-left: 250px;
            padding: 20px;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            padding-left: 15px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .sidebar .active {
            background-color: #007bff;
        }

        /* Card Styles */
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            background-color: white;
            padding: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            text-align: left;
        }

        /* Footer Styles */
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>
    <!-- Sidebar Menu -->
    <div class="sidebar">
        <h3>GESTION DES TÂCHES</h3>
        <a href="{{ route('tasks.index') }}" class="active">Liste des Tâches</a>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Détails de la Tâche : {{ $task->title }}</h1>

        <!-- Card for task details -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Informations de la Tâche</h4>
                <p><strong>Titre :</strong> {{ $task->title }}</p>
                <p><strong>Description :</strong> {{ $task->description }}</p>
                <p><strong>Statut :</strong>
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
                </p>
                <p><strong>Priorité :</strong>
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
                </p>
                <p><strong>Date de Création :</strong> {{ $task->created_at }}</p>
                <p><strong>Dernière Mise à Jour :</strong> {{ $task->updated_at }}</p>
            </div>
        </div>

       <!-- Projet Associé -->
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Projet Associé</h4>
    </div>
    <div class="card-body">
        <p><strong>Titre du Projet :</strong>
            <span class="{{ $task->project ? 'text-success' : 'text-danger' }}">
                {{ $task->project->title ?? 'Aucun projet associé' }}
            </span>
        </p>
    </div>
</div>

<!-- Utilisateur Assigné -->
<div class="card mb-4">
    <div class="card-header bg-secondary text-white">
        <h4 class="mb-0">Assignée à</h4>
    </div>
    <div class="card-body">
        <p>
            <strong>Utilisateur :</strong>
            <span class="{{ $task->user ? 'text-success' : 'text-danger' }}">
                {{ $task->user->name ?? 'Non assignée' }}
            </span>
        </p>
    </div>
</div>


    <!-- Footer -->
    <footer>
        <p>© 2024 Faciloyer. Tous droits réservés.</p>
    </footer>
</body>

</html>
