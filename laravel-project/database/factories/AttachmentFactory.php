<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attachment;
use Faker\Generator as Faker;

$factory->define(Attachment::class, function (Faker $faker) {
    return [
        'name' => sprintf("%s.%s", str_random(), $faker->randomElement(['png', 'jpg'])),
    ];
});
