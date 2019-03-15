<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'detail' => $faker->text($maxNbChars = 200),
        'ended_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = '2 years', $timezone = 'Asia/Manila'),
    ];
});
