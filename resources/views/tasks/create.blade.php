<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Créer une Tâche</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            border: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Créer une Nouvelle Tâche</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <!-- Sélection du projet -->
            <div class="form-group">
                <label for="project_id">Projet</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    <option value="">-- Sélectionnez un projet --</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Titre de la tâche -->
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Titre de la tâche" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Description de la tâche"></textarea>
            </div>

            <!-- État -->
            <div class="form-group">
                <label for="status">État</label>
                <select name="status" id="status" class="form-control">
                    <option value="not_started">Non commencée</option>
                    <option value="in_progress">En cours</option>
                    <option value="completed">Terminée</option>
                </select>
            </div>

            <!-- Priorité -->
            <div class="form-group">
                <label for="priority">Priorité</label>
                <select name="priority" id="priority" class="form-control">
                    <option value="low">Basse</option>
                    <option value="medium" selected>Moyenne</option>
                    <option value="high">Haute</option>
                </select>
            </div>

            <!-- Assignation à un utilisateur -->
            <div class="form-group">
                <label for="assigned_to">Assigner à un Collaborateur (Email)</label>
                <input type="email" name="assigned_to" id="assigned_to" class="form-control" placeholder="Email de l'utilisateur" required>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn">Créer la Tâche</button>
        </form>
    </div>
</body>

</html>
