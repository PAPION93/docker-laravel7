<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'title'   => $faker->sentence,
        'content' => $faker->paragraph,
        'parent_id' => 1,
    ];
});
