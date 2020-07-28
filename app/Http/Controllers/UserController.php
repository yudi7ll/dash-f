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
        $posts = $user->post()->latest()->paginate(8);
        $userinfo = $user->userinfo;

        return view('user.profile')
            ->nest('postcard', 'components.postcard', compact('posts'))
            ->nest('bio', 'components.userbio', compact('userinfo'));
    }
}
