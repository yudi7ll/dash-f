<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    if (User::doesntExist()) {
        factory(User::class)->create();
    }

    $ids = User::all()->modelKeys();
    $user = [
        'email' => User::find($faker->randomElement($ids))->email,
        'password' => 'password'
    ];

    // try login
    auth()->logout();
    auth()->attempt($user);

    $url = 'https://picsum.photos/id/';

    return [
        'user_id' => '',
        'title' => $faker->realText(50),
        'slug' => '',
        'published' => 'on',
        'description' => $faker->realText(80),
        'cover' => $url . $faker->randomNumber(3) . '/640/320',
        'body' => $faker->realText(1000),
    ];
});
