<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    if (Post::doesntExist()) {
        factory(Post::class)->create();
    }

    if (User::doesntExist()) {
        factory(User::class)->create();
    }

    $ids = User::all()->modelKeys();
    $user = User::find($faker->randomElement($ids));
    $creds = [
        'email' => $user->email,
        'password' => 'password'
    ];
    $posts = Post::all()->modelKeys();
    $postId = Post::find($faker->randomElement($posts))->id;


    // try login
    auth()->logout();
    auth()->attempt($creds);

    // if the posts already liked
    $isLiked = Like::where('user_id', $user)
        ->where('post_id', $postId)
        ->exists();

    $data = [
        'user_id' => $user->id,
        'post_id' => $postId,
    ];

    return $isLiked ? [] : $data;
});
