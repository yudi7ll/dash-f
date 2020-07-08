<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $post = factory(Post::class)->create();
    $user = factory(User::class)->create();

    auth()->attempt([
        'email' => $user->email,
        'password' => 'password',
    ]);

    return [
        'post_id' => $post->id,
        'user_id' => auth()->id(),
        'content' => $faker->sentence,
    ];
});
