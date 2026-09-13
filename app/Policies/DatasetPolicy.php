<?php

namespace App\Policies;

use App\Models\Dataset;
use App\Models\User;

class DatasetPolicy
{

    /**
     * View dataset list
     */
    public function viewAny(User $user): bool
    {
        return true;
    }


    /**
     * View single dataset
     */
    public function view(User $user, Dataset $dataset): bool
    {
        return true;
    }


    /**
     * Upload dataset
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
     * Update dataset
     */
    public function update(User $user, Dataset $dataset): bool
    {

        // Admin can manage everything
        if (strtolower($user->role) === 'admin') {
            return true;
        }


        // Only uploader can update
        return $dataset->uploaded_by === $user->id;

    }


    /**
     * Delete dataset
     */
    public function delete(User $user, Dataset $dataset): bool
    {

        // Admin
        if (strtolower($user->role) === 'admin') {
            return true;
        }


        // Only uploader can delete
        return $dataset->uploaded_by === $user->id;

    }


    public function restore(User $user, Dataset $dataset): bool
    {
        return false;
    }


    public function forceDelete(User $user, Dataset $dataset): bool
    {
        return false;
    }

}