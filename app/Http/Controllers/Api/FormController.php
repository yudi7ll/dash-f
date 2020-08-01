<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;

class FormController extends Controller
{
    public function index($form)
    {
        $user = auth()->user();

        return view('components.form.account', compact('user'));
    }
    /**
     * Display account edit form
     *
     * @param \App\User $user
     * @return \Illuminate\Support\Facades\View
     */
    public function user(User $user)
    {
        return view('components.form.account', compact('user'));
    }

    /**
     * Display the profile edit form
     *
     * @param \App\User $user
     * @return \Illuminate\Support\Facades\View
     */
    public function profile(User $user)
    {
        return view('components.form.profile', compact('user'));
    }
}
