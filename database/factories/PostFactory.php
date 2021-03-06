<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'description' => $faker->text(200),
        'content' => $faker->sentence(200),
        'image' => 'https://source.unsplash.com/random',
    ];
});
