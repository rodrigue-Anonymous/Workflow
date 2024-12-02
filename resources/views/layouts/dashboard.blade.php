@extends('layouts.master_dash')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Particules animées en arrière-plan -->
    <div id="particles-js"></div>

    <!-- Effets orage -->
    <div class="lightning"></div>

    <!-- Message de Bienvenue -->
    <div class="welcome-banner">
        <h1>Bienvenue sur votre Workflow, <span>{{ Auth::user()->name }}</span>!</h1>
        <p>Gérez vos projets, assignez des tâches, et suivez votre progression en un seul endroit.</p>
    </div>

    <!-- Statistiques -->
    <div class="row text-center g-4">
        <!-- Projets Complétés -->
        <div class="col-lg-3 col-md-6">
            <div class="panel futuristic-panel">
                <div class="emoji bounce" style="font-size: 6rem;">🎯</div>
                <h5>Projets Complétés</h5>
                <p class="stat">{{ $completedProjects }}</p>
            </div>
        </div>

        <!-- Projets En Cours -->
        <div class="col-lg-3 col-md-6">
            <div class="panel futuristic-panel">
                <div class="emoji rotate" style="font-size: 6rem;">🛠️</div>
                <h5>Projets En Cours</h5>
                <p class="stat">{{ $ongoingProjects }}</p>
            </div>
        </div>

        <!-- Tâches Complétées -->
        <div class="col-lg-3 col-md-6">
            <div class="panel futuristic-panel">
                <div class="emoji pulsate" style="font-size: 6rem;">🏆</div>
                <h5>Tâches Complétées</h5>
                <p class="stat">{{ $completedTasks }}</p>
            </div>
        </div>

        <!-- Tâches En Cours -->
        <div class="col-lg-3 col-md-6">
            <div class="panel futuristic-panel">
                <div class="emoji zoom" style="font-size: 6rem;">📋</div>
                <h5>Tâches En Cours</h5>
                <p class="stat">{{ $ongoingTasks }}</p>
            </div>
        </div>
    </div>

    <!-- Bouton Assigner une Tâche -->
    <div class="text-center mt-5">
        <a href="{{ route('tasks.create') }}" class="btn futuristic-button">
            Assigner une Tâche
        </a>
    </div>
</div>

<!-- Styles -->
<style>
    /* Arrière-plan animé */
    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: #0d1117;
    }

    body {
        font-family: 'Courier New', Courier, monospace;
        background-color: #0d1117;
        color: #c9d1d9;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .container-fluid {
        position: relative;
        z-index: 2;
        padding: 30px;
    }

    /* Message de Bienvenue */
    .welcome-banner {
        text-align: center;
        color: #58a6ff;
        margin-bottom: 50px;
    }

    .welcome-banner h1 {
        font-size: 3rem;
        font-weight: bold;
        text-transform: uppercase;
        text-shadow: 0 0 10px #58a6ff, 0 0 20px #58a6ff, 0 0 40px #58a6ff;
        animation: neon-flicker 2s infinite alternate;
    }

    .welcome-banner h1 span {
        color: #ffc107;
        text-shadow: 0 0 10px #ffc107, 0 0 20px #ffc107, 0 0 40px #ffc107;
    }

    .welcome-banner p {
        font-size: 1.2rem;
        color: #c9d1d9;
    }

    @keyframes neon-flicker {
        0%, 100% {
            text-shadow: 0 0 10px #58a6ff, 0 0 20px #58a6ff, 0 0 40px #58a6ff;
        }
        50% {
            text-shadow: 0 0 5px #58a6ff, 0 0 15px #58a6ff, 0 0 30px #58a6ff;
        }
    }

    /* Panneaux futuristes */
    .panel {
        position: relative;
        background: linear-gradient(145deg, #21262d, #161b22);
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        color: white;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.4), inset 0 0 10px rgba(255, 255, 255, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .panel:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 30px rgba(88, 166, 255, 0.6);
    }

    .emoji {
        font-size: 6rem;
        margin-bottom: 10px;
    }

    /* Animations des emojis */
    .bounce {
        animation: bounce 2s infinite;
    }

    .rotate {
        animation: rotate 3s linear infinite;
    }

    .zoom {
        animation: zoom 2s infinite alternate;
    }

    .pulsate {
        animation: pulsate 1.5s infinite alternate;
    }

    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-15px);
        }
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes zoom {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.2);
        }
    }

    @keyframes pulsate {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.1);
        }
    }

    /* Bouton futuriste */
    .futuristic-button {
        display: inline-block;
        padding: 15px 30px;
        margin-top: 40px;
        font-size: 18px;
        color: #0d1117;
        background: linear-gradient(90deg, #58a6ff, #1f6feb);
        border-radius: 50px;
        text-transform: uppercase;
        font-weight: bold;
        box-shadow: 0 4px 15px rgba(88, 166, 255, 0.6);
        transition: transform 0.3s, box-shadow 0.3s;
        text-decoration: none;
    }

    .futuristic-button:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(88, 166, 255, 0.8);
    }
</style>

<!-- Script pour particules -->
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
    particlesJS.load('particles-js', 'https://cdn.jsdelivr.net/particles.js/2.0.0/demo/particlesjs-config.json');
</script>
@endsection
