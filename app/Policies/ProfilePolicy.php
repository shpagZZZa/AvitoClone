<?php

namespace App\Policies;

use App\Models\Profile;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Profile  $profile
     * @return mixed
     */
    public function view(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can comment the profile.
     *
     * @param  User  $user
     * @param Profile $profile
     * @return mixed
     */
    public function comment(User $user, Profile $profile)
    {
        return $user->id != $profile->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Profile  $profile
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return $user->id == $profile->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Profile  $profile
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Profile  $profile
     * @return mixed
     */
    public function restore(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Profile  $profile
     * @return mixed
     */
    public function forceDelete(User $user, Profile $profile)
    {
        //
    }
}
