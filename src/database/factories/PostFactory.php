<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    auth()->attempt([
        'email' => 'admin@admin.com',
        'password' => 'password'
    ]);
    $title = $faker->realText(30);

    return [
        'user_id' => auth()->id(),
        'title' => $title,
        'slug' => Str::slug($title, '-').'-'. substr(md5(time()), 0, 5),
        'published' => 'on',
        'description' => $faker->realText(50),
        'cover' => $faker->imageUrl(),
        'body' => $faker->realText(1000),
    ];
});
