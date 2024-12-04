<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Créer une Tâche</title>

    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            margin-top: 20px;
        }

        /* Sidebar and Content */
        .col-md-3 {
            background-color: #343a40;
            padding: 20px;
            color: white;
            height: 100vh;
            position: fixed;
            width: 25%;
        }

        .col-md-9 {
            margin-left: 25%;
            padding: 20px;
        }

        /* Card styling */
        .card {
            border-radius: 0.5rem;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Form styling */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 0.5rem;
            border: 1px solid #ddd;
            padding: 0.75rem;
            width: 100%;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Sidebar links */
        .sidebar-links {
            list-style: none;
            padding: 0;
        }

        .sidebar-links li {
            margin-bottom: 15px;
        }

        .sidebar-links a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            display: block;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar-links a:hover {
            background-color: #575757;
        }

        /* Footer */
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <h3>Gestion des Tâches</h3>
                <ul class="sidebar-links">
                    <li><a href="{{ route('tasks.index') }}">Dashboard</a></li>
                </ul>
            </div>

            <!-- Formulaire de création -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Créer une Nouvelle Tâche</h4>
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="project_id">Projet</label>
                                <select name="project_id" id="project_id" class="form-control" required>
                                    <option value="">-- Sélectionnez un projet --</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Titre de la tâche" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Description de la tâche"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="status">État</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="not_started">Non commencée</option>
                                    <option value="in_progress">En cours</option>
                                    <option value="completed">Terminée</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="priority">Priorité</label>
                                <select name="priority" id="priority" class="form-control">
                                    <option value="low">Basse</option>
                                    <option value="medium" selected>Moyenne</option>
                                    <option value="high">Haute</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="assigned_to">Assigner à un Collaborateur (Email)</label>
                                <input type="email" name="assigned_to" id="assigned_to" class="form-control" placeholder="Email de l'utilisateur" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Créer la Tâche</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2024 Faciloyer. Tous droits réservés.</p>
    </footer>
</body>

</html>
