<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => 'i4admin',
        'email' => $faker->email,
        'first_name' => $faker->firstNameMale,
        'middle_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'birthdate' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-5 years', $timezone = 'Asia/Manila'),
        'landline' => '123322',
        'mobile' => '09123123',
        'expiration' => $faker->dateTimeBetween($startDate = 'now', $endDate = '2 years', $timezone = 'Asia/Manila'),
        'status' => 'Active',
        'roles' => 'Admin',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
