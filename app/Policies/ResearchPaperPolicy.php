<?php

namespace App\Policies;

use App\Models\ResearchPaper;
use App\Models\User;

class ResearchPaperPolicy
{

    /**
     * View paper list
     */
    public function viewAny(User $user): bool
    {
        return true;
    }


    /**
     * View single paper
     */
    public function view(User $user, ResearchPaper $researchPaper): bool
    {
        return true;
    }


    /**
     * Upload research paper
     */
    public function create(User $user): bool
    {
        return in_array(
            strtolower($user->role),
            [
                'student',
                'faculty',
                'supervisor',
                'admin'
            ]
        );
    }


    /**
     * Update paper
     */
    public function update(User $user, ResearchPaper $researchPaper): bool
    {

        // Admin can manage everything
        if (strtolower($user->role) === 'admin') {
            return true;
        }


        // Only uploader can update
        return $researchPaper->author_id === $user->id;

    }


    /**
     * Delete paper
     */
    public function delete(User $user, ResearchPaper $researchPaper): bool
    {

        // Admin
        if (strtolower($user->role) === 'admin') {
            return true;
        }


        // Only uploader can delete
        return $researchPaper->author_id === $user->id;

    }


    public function restore(User $user, ResearchPaper $researchPaper): bool
    {
        return false;
    }


    public function forceDelete(User $user, ResearchPaper $researchPaper): bool
    {
        return false;
    }

}