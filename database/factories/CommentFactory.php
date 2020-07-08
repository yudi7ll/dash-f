<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    if (!Post::all()->count()) {
        factory(Post::class)->create();
    }

    if (!User::all()->count()) {
        factory(User::class)->create();
    }

    $user = User::all('email')->first()->email;
    $posts = Post::all()->modelKeys();

    auth()->attempt([
        'email' => $user,
        'password' => 'password',
    ]);

    return [
        'post_id' => Post::findOrFail($faker->randomElement($posts)),
        'user_id' => auth()->id(),
        'content' => $faker->sentence,
    ];
});
