<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    if (!User::all()->count()) {
        factory(User::class)->create();
    }

    $user = [
        'email' => User::all()->first()->email,
        'password' => 'password'
    ];

    // try login
    if (!auth()->check()) {
        auth()->attempt($user);
    }

    return [
        'user_id' => '',
        'title' => $faker->realText(30),
        'slug' => '',
        'published' => 'on',
        'description' => $faker->realText(50),
        'cover' => $faker->imageUrl(800, 400),
        'body' => $faker->realText(1000),
    ];
});
