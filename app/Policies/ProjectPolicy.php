<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Détermine si l'utilisateur peut mettre à jour le projet.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return bool
     */
    public function update(User $user, Project $project)
    {
        // L'utilisateur peut modifier le projet s'il en est le propriétaire
        return $user->id === $project->user_id;
    }

    /**
     * Détermine si l'utilisateur peut supprimer le projet.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return bool
     */
    public function delete(User $user, Project $project)
    {
        // L'utilisateur peut supprimer le projet s'il en est le propriétaire
        return $user->id === $project->user_id;
    }
}
