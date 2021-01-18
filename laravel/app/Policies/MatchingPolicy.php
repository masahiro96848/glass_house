<?php

namespace App\Policies;

use App\Matching;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MatchingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Matching  $matching
     * @return mixed
     */
    public function view(?User $user, Matching $matching)
    {
        return optional($user)->id === $matching->apply_id || optional($user)->id === $matching->approve_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Matching  $matching
     * @return mixed
     */
    public function update(User $user, Matching $matching)
    {
        return optional($user)->id === $matching->apply_id || optional($user)->id === $matching->approve_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Matching  $matching
     * @return mixed
     */
    public function delete(User $user, Matching $matching)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Matching  $matching
     * @return mixed
     */
    public function restore(User $user, Matching $matching)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Matching  $matching
     * @return mixed
     */
    public function forceDelete(User $user, Matching $matching)
    {
        //
    }
}
