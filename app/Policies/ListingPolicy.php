<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Listing $listing)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can edit the model.
     */
    public function edit(User $user, Listing $listing)
    {
        return $user->hasRole(['Super-Admin', 'Admin', 'Staff']) || $user->id === $listing->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Listing $listing)
    {
        return $user->hasRole(['Super-Admin', 'Admin', 'Staff']) || $user->id === $listing->user_id;
    }

    /**
     * Determine whether the user can view the deleted listings.
     */
    public function viewDeleted(User $user)
    {
        return $user->hasRole(['Super-Admin', 'Admin', 'Staff']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Listing $listing)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Listing $listing)
    {
        //
    }
}
