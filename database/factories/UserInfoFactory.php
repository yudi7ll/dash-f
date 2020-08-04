<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserInfo;
use Faker\Generator as Faker;

$factory->define(UserInfo::class, function (Faker $faker) {
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

    return [
        'user_id' => '',
        'bio' => $faker->realText(80),
        'twitter' => 'https://twitter.com',
        'github' => 'https://github.com',
        'work_as' => 'Web Developer',
        'work_at' => 'Silicon Valley',
        'birth_date' => $faker->date(),
    ];
});
