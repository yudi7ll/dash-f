<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    if (Post::doesntExist()) {
        factory(Post::class)->create();
    }

    if (User::doesntExist()) {
        factory(User::class)->create();
    }

    $ids = User::all()->modelKeys();
    $user = [
        'email' => User::find($faker->randomElement($ids))->email,
        'password' => 'password'
    ];
    $posts = Post::all()->modelKeys();

    // try login
    auth()->logout();
    auth()->attempt($user);

    return [
        'post_id' => Post::findOrFail($faker->randomElement($posts)),
        'user_id' => auth()->id(),
        'content' => $faker->sentence,
    ];
});
