<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether user can update the specified user
     *
     * @param \App\User $user
     * @param \App\User $profile
     * @return mixed
     */
    public function update(User $user, $profile)
    {
        if ($user->id === $profile->id) {
            return true;
        }

        if (auth()->guest()) {
            return redirect('/login');
        }

        return false;
    }
}
