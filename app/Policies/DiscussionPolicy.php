<?php

namespace App\Policies;

use App\Models\Discussion;
use App\Models\User;

class DiscussionPolicy
{

    /**
     * View discussions
     */
    public function viewAny(User $user): bool
    {
        return true;
    }


    /**
     * View single discussion
     */
    public function view(User $user, Discussion $discussion): bool
    {
        return true;
    }


    /**
     * Create discussion
     */
    public function create(User $user): bool
    {
        // All authenticated users can participate
        return true;
    }


    /**
     * Update discussion
     */
    public function update(User $user, Discussion $discussion): bool
    {

        // Admin
        if (strtolower($user->role) === 'admin') {
            return true;
        }


        // Only discussion owner can update
        return $discussion->user_id === $user->id;

    }


    /**
     * Delete discussion
     */
    public function delete(User $user, Discussion $discussion): bool
    {

        // Admin
        if (strtolower($user->role) === 'admin') {
            return true;
        }


        // Only discussion owner can delete
        return $discussion->user_id === $user->id;

    }


    public function restore(User $user, Discussion $discussion): bool
    {
        return false;
    }


    public function forceDelete(User $user, Discussion $discussion): bool
    {
        return false;
    }

}