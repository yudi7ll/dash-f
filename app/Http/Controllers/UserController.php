<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    /**
     * Display the user profile
     *
     * @param \App\User
     * @return \Illuminate\Support\Facades\View
     */
    public function profile(User $user)
    {
        return $user;
    }
}