<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function create(Admin $admin): Response
    {


        return $admin->hasAnyPermission('add_user')
            ? Response::allow()
            : Response::deny('You cannot create users.');
    }

    public function show(Admin $admin, User $user): Response
    {



        return $admin->hasAnyPermission('show_user')
            ? Response::allow()
            : Response::deny('You cannot view this user.');
    }

    public function update(Admin $admin, User $user): Response
    {

        return $admin->hasAnyPermission('edit_user')
            ? Response::allow()
            : Response::deny('You cannot update this user.');
    }

    public function delete(Admin $admin, User $user): Response
    {
        return $admin->hasAnyPermission('delete_user')
            ? Response::allow()
            : Response::deny('You cannot delete this user.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
