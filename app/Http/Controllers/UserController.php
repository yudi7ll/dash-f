<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Http\Requests\UserSecurityRequest;
use App\User;
use App\UserInfo;
use Hash;
use Request;
use Validator;
use View;

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
     * @param string $page
     * @return mixed
     */
    public function edit(User $user, $page)
    {
        $this->authorize('update', $user);
        $user = auth()->user();
        $view = "components.form.{$page}";

        // if the view file doesn't exists
        if (! View::exists($view)) {
            return redirect("{$user->username}/edit/profile");
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
    public function updateAccount(User $user)
    {
        $data = request()->all();
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:100', 'unique:users'],
            'cover' => ['image', 'nullable'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $updated = $user->update($data);

        if (! $updated) {
            return redirect()->back()->with('error', 'Something went wrong when updating your data, please try again!');
        }

        return redirect()->back()->with('success', 'Your data updated successfully!');
    }

    /**
     * Update the UserInfo of current user
     *
     * @param \App\User $user
     * @param \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function updateProfile(User $user, UserInfoRequest $request)
    {
        $data = $request->except(['_token', '_method']);
        $data['user_id'] = $user->id;

        $user->userinfo->update($data);

        return redirect()->back()->with('success', 'Your data updated successfully!');
    }

    /**
     * Update the password of curent user
     *
     * @param \App\User $user
     * @param \App\Http\Requests\UserSecurityRequest $request
     * @return \Illuminate\Support\Facades\Redirect;
     */
    public function updateSecurity(User $user, UserSecurityRequest $request)
    {
        $user->update([ 'password' => Hash::make($request->new_password) ]);

        return redirect()->back()->with('success', 'Your password updated successfully!');
    }
}
