<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Http\Requests\UserRequest;
use App\User;
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
     * Update data account of specified user
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user->name = $data['name'];
        $user->username = $data['username'];
        $user->email = $data['email'];
        $updated = $user->saveOrFail();

        if (!$updated) {
            return redirect()->back()->with('status', 'Something went wrong when updating your data, please try again!');
        }

        return redirect()->back()->with('status', 'Your data updated successfully!');
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
