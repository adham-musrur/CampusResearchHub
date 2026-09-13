<?php

namespace App\Policies;

use App\Models\ResearchProject;
use App\Models\User;

class ResearchProjectPolicy
{

    /**
     * Anyone authenticated can view projects
     */
    public function viewAny(User $user): bool
    {
        return true;
    }


    /**
     * View a single project
     */
    public function view(User $user, ResearchProject $researchProject): bool
    {
        return true;
    }


    /**
     * Create a research project
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
     * Update a project
     */
    public function update(User $user, ResearchProject $researchProject): bool
    {

        // Admin can update everything
        if (strtolower($user->role) === 'admin') {
            return true;
        }


        // Project owner can update
        if ($researchProject->user_id === $user->id) {
            return true;
        }


        // Assigned supervisor can update
        return $researchProject->members()
            ->where('user_id', $user->id)
            ->where('member_role', 'Supervisor')
            ->exists();

    }


    /**
     * Delete a project
     */
    public function delete(User $user, ResearchProject $researchProject): bool
    {

        // Admin can delete
        if (strtolower($user->role) === 'admin') {
            return true;
        }


        // Only project owner can delete
        return $researchProject->user_id === $user->id;

    }


    /**
     * Manage project members
     */
    public function manageMembers(User $user, ResearchProject $researchProject): bool
    {

        // Admin
        if (strtolower($user->role) === 'admin') {
            return true;
        }


        // Project owner
        if ($researchProject->user_id === $user->id) {
            return true;
        }


        // Assigned supervisor
        return $researchProject->members()
            ->where('user_id', $user->id)
            ->where('member_role', 'Supervisor')
            ->exists();

    }


    /**
     * Restore
     */
    public function restore(User $user, ResearchProject $researchProject): bool
    {
        return false;
    }


    /**
     * Permanent delete
     */
    public function forceDelete(User $user, ResearchProject $researchProject): bool
    {
        return false;
    }

}