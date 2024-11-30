<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <h1 class="h3">Gestion des Projets</h1>
            <nav>
                <a href="{{ route('dashboard') }}" class="text-white me-3">Tableau de bord</a>
                <a href="{{ route('projects.index') }}" class="text-white me-3">Projets</a>
                <a href="{{ route('tasks.index') }}" class="text-white">Tâches</a>
                <a href="{{ route('logout') }}" class="text-white float-end">Déconnexion</a>
            </nav>
        </div>
    </header>
    <main class="container my-4">
        @yield('content')
    </main>
</body>
</html>
