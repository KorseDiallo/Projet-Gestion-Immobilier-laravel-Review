<?php

namespace App\Policies;

use App\Models\User;
use App\Models\bien;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class BienPolicy
{
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
    public function view(User $user, bien $bien)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, bien $bien)
    {
        return $user->id==$bien->users_id ? Response::allow() : Response::deny("Vous avez pas le droit");
        // if(Auth::user()->id==$bien->users_id){
        //     return "hello";
        // }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, bien $bien)
    {
        return $user->id==$bien->users_id ? Response::allow() : Response::deny("Vous avez pas le droit");
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, bien $bien)
    {
        return $user->id==$bien->users_id ? Response::allow() : Response::deny("Vous avez pas le droit");
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, bien $bien)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, bien $bien)
    {
        //
    }
}
