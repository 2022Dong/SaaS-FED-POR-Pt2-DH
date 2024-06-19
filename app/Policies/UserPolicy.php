<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any users.
     */
    public function viewAny(User $user)
    {
        return in_array($user->role, ['Staff', 'Admin', 'Super-Admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model)
    {
        return $user->role === 'Admin' || $user->role === 'Super-Admin' || ($user->role === 'Staff' && $model->role === 'Client');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model)
    {
        return $user->role === 'Admin' || $user->role === 'Super-Admin' || ($user->role === 'Staff' && $model->role === 'Client');
    }
}
