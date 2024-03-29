<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ImageController;
use App\Http\Requests\UserInfoRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserSecurityRequest;
use App\User;
use Hash;
use View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display the user profile
     *
     * @param \App\User $user
     * @return \Illuminate\Support\Facades\View
     */
    public function profile(User $user)
    {
        return view('user.show', compact('user'))
            ->nest('bio', 'components.userbio', compact('user'));
    }

    /**
     * Edit the user profile
     *
     * @param \App\Http\Requests\UserRequest $request
     * @param string $page
     * @return mixed
     */
    public function edit(User $user)
    {
        $page = request()->page;
        $view = "components.form.{$page}";

        // if the view file doesn't exists
        if (! View::exists($view)) {
            return redirect("{$user->username}/edit?page=profile");
        }

        return view('user.edit', $user)
            ->nest('form', $view, compact('user'));
    }

    /**
     * Update data account of current user
     *
     * @param \App\User $user
     * @param \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function updateAccount(UserRequest $request, User $user)
    {
        // update the images on storage
        $filename = (new ImageController)->store($request, $user->username);
        $data = $request->validated();

        if ($filename) {
            $data['cover'] = $filename;
        }

        // update data on database
        $user->update($data);

        // couldn't redirect->back() because the username is changed
        return redirect($user->username . '/edit?page=account')
            ->with('success', 'Your data updated successfully!');
    }

    /**
     * Update the UserInfo of current user
     *
     * @param \App\Http\Requests\UserRequest $request
     * @param \App\User $user
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function updateProfile(UserInfoRequest $request, User $user)
    {
        $user->userinfo->update($request->validated());

        return redirect()->back()->with('success', 'Your data updated successfully!');
    }

    /**
     * Update the password of curent user
     *
     * @param \App\User $user
     * @param \App\Http\Requests\UserSecurityRequest $request
     * @return \Illuminate\Support\Facades\Redirect;
     */
    public function updateSecurity(UserSecurityRequest $request, User $user)
    {
        $user->update([ 'password' => Hash::make($request->new_password) ]);

        return redirect()->back()->with('success', 'Your password updated successfully!');
    }
}
