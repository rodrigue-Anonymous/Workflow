<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Détails du Projet" name="description">
    <meta content="Faciloyer" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Détails du Projet</title>

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
        <h3>MES TACHES</h3>
        <a href="{{ route('projects.index') }}" class="active">Liste des Projets</a>
       
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Détails du Projet : {{ $project->title }}</h1>

        <!-- Card for project details -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Informations du Projet</h4>
                <p><strong>Titre :</strong> {{ $project->title }}</p>
                <p><strong>Description :</strong> {{ $project->description }}</p>
                <p><strong>Date Limite :</strong> {{ $project->deadline }}</p>
            </div>
        </div>

        <!-- Tasks Associated with the Project -->
        <h4 class="mt-4">Tâches Associées</h4>
        @if($tasks->isEmpty())
            <p>Aucune tâche associée à ce projet.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>État</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ ucfirst($task->status) }}</td> <!-- Affiche l'état de la tâche -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2024 Faciloyer. Tous droits réservés.</p>
    </footer>
</body>

</html>
