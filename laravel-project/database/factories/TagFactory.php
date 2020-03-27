<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $name = ucfirst($faker->optional(0.9, 'Laravel')->word);

    return [
        'name' => $name,
        'slug' => str_slug($name),
    ];
});
