<?php

namespace App\Policies;

use App\Models\ResearchUpdate;
use App\Models\User;

class ResearchUpdatePolicy
{

    /**
     * View updates list
     */
    public function viewAny(User $user): bool
    {
        return true;
    }


    /**
     * View single update
     */
    public function view(User $user, ResearchUpdate $researchUpdate): bool
    {
        return true;
    }


    /**
     * Create research update
     */
    public function create(User $user): bool
    {

        return in_array(
            strtolower($user->role),
            [
                'faculty',
                'supervisor',
                'admin'
            ]
        );

    }


    /**
     * Update research update
     */
    public function update(User $user, ResearchUpdate $researchUpdate): bool
    {

        // Admin can manage everything
        if (strtolower($user->role) === 'admin') {
            return true;
        }


        // Creator can update
        return $researchUpdate->user_id === $user->id;

    }


    /**
     * Delete research update
     */
    public function delete(User $user, ResearchUpdate $researchUpdate): bool
    {

        // Admin
        if (strtolower($user->role) === 'admin') {
            return true;
        }


        // Creator can delete
        return $researchUpdate->user_id === $user->id;

    }


    public function restore(User $user, ResearchUpdate $researchUpdate): bool
    {
        return false;
    }


    public function forceDelete(User $user, ResearchUpdate $researchUpdate): bool
    {
        return false;
    }

}