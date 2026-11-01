<?php

namespace App\Policies;

use App\Models\Oeuvre;
use App\Models\User;

class OeuvrePolicy
{
    /** Liste et détail : ouverts à tous (le détail sera réservé aux connectés en #29, par middleware) */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Oeuvre $oeuvre): bool
    {
        return true;
    }

    /** Ajouter, modifier, supprimer : contributeurs et administrateurs seulement */
    public function create(User $user): bool
    {
        return $user->hasRole('contributeur', 'admin');
    }

    public function update(User $user, Oeuvre $oeuvre): bool
    {
        return $user->hasRole('contributeur', 'admin');
    }

    public function delete(User $user, Oeuvre $oeuvre): bool
    {
        return $user->hasRole('contributeur', 'admin');
    }
}
