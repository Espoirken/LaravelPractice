<?php

use Faker\Generator as Faker;

$factory->define(App\Child::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => $faker->numberBetween($min = 1, $max = 2),
        'credits' => $faker->numberBetween($min = 1, $max = 4),
        'expiration' => $faker->dateTimeBetween('+0 days', '+2 years'),
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender' => $faker->randomElement($array = array ('Male','Female')),
        'level' => $faker->randomElement($array = array ('1','2', '3')),
        'sport' => $faker->randomElement($array = array ('Baseball', 'Softball')),
        'batting' => $faker->randomElement($array = array ('Left','Right','Both')),
        'throwing_hand' => $faker->randomElement($array = array ('Left','Right','Both')),
        'special_medical_condition' => $faker->sentence,
    ];
});
