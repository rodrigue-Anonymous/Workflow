<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modifier le Projet</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
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

        .btn-success {
            background-color: #28a745;
            border: none;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
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
                <h3></h3>
                <ul class="sidebar-links">
                    <li><a href="{{ route('projects.index') }}#">Retour au Dashboard</a></li>
                    
                </ul>
            </div>

            <!-- Formulaire de modification -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Modifier le Projet</h4>
                        <form action="{{ route('projects.update', $project) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ $project->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="deadline">Date Limite</label>
                                <input type="date" name="deadline" class="form-control" value="{{ $project->deadline }}" required>
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Mettre à Jour</button>
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
