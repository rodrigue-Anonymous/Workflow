<?php

namespace App\Providers;

use App\Models\Project;
use App\Policies\ProjectPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Les politiques de l'application.
     *
     * @var array
     */
    protected $policies = [
        Project::class => ProjectPolicy::class, // Associe la policy au modèle Project
    ];

    /**
     * Enregistrez les services d'autorisation pour l'application.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies(); // Enregistre les politiques dans Laravel

        // Autres gates ou policies peuvent être définis ici si nécessaire
    }
}
