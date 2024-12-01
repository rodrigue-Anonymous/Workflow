<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Tâche Assignée</title>
</head>
<body>
    <h1>Bonjour,</h1>
    <p>Une nouvelle tâche vous a été assignée :</p>
    <ul>
        <li><strong>Titre :</strong> {{ $task->title }}</li>
        <li><strong>Description :</strong> {{ $task->description }}</li>
        <li><strong>Priorité :</strong> {{ ucfirst($task->priority) }}</li>
        <li><strong>Date :</strong> {{ $task->created_at->format('d/m/Y') }}</li>
    </ul>
    <p>Merci de vérifier et de la traiter dès que possible.</p>
</body>
</html>
