<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    /**
     * Display the user profile
     *
     * @param \App\User $user
     * @return \Illuminate\Support\Facades\View
     */
    public function profile(User $user)
    {
        $posts = $user->posts()->latest()->paginate(8);

        return view('user.show')
            ->nest('postcard', 'components.postcard', compact('posts'))
            ->nest('bio', 'components.userbio', compact('user'));
    }

    /**
     * Edit the user profile
     *
     * @param \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('user.edit', $user);
    }

    /**
     * Update data user profile
     *
     * @param \App\User $user
     * @param \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(User $user, UserRequest $request)
    {
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->cover = $request->cover;
        $user->saveOrFail();

        $this->updateUserinfo(request());
    }

    /**
     * Update the UserInfo of current user
     *
     * @param \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update_userinfo(UserInfoRequest $request)
    {
        return $request;
    }
}
