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
        'expiration' => NULL,
        'status' => 'Active',
        'roles' => 'Admin',
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'password' => '$2y$10$MI9ZYVFXUbdf97z4Lfi4tu99f56Yj2s29rFLu9LDcJ3j0E5.93o6K', // i4admin
        'remember_token' => Str::random(10),
    ];
});

$factory->state(User::class, 'admin', function (Faker $faker) {
    return [
        'username' => 'i4admin',
        'email' => $faker->email,
        'first_name' => $faker->firstNameMale,
        'middle_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'birthdate' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-5 years', $timezone = 'Asia/Manila'),
        'landline' => '123322',
        'mobile' => '09123123',
        'expiration' => NULL,
        'status' => 'Active',
        'roles' => 'Admin',
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'password' => '$2y$10$MI9ZYVFXUbdf97z4Lfi4tu99f56Yj2s29rFLu9LDcJ3j0E5.93o6K', // i4admin
        'remember_token' => Str::random(10),
    ];
});

$factory->state(User::class, 'client', function (Faker $faker) {
    return [
        'username' => 'client',
        'email' => $faker->email,
        'first_name' => $faker->firstNameMale,
        'middle_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'birthdate' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-5 years', $timezone = 'Asia/Manila'),
        'landline' => '123322',
        'mobile' => '09123123',
        'expiration' => $faker->dateTimeBetween($startDate = '1 years', $endDate = '2 years', $timezone = 'Asia/Manila'),
        'status' => 'Active',
        'roles' => 'Client',
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'password' => '$2y$10$MI9ZYVFXUbdf97z4Lfi4tu99f56Yj2s29rFLu9LDcJ3j0E5.93o6K', // i4admin
        'remember_token' => Str::random(10),
    ];
});

$factory->state(User::class, 'coach', function (Faker $faker) {
    return [
        'username' => 'coach',
        'email' => $faker->email,
        'first_name' => $faker->firstNameMale,
        'middle_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'birthdate' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-5 years', $timezone = 'Asia/Manila'),
        'landline' => '123322',
        'mobile' => '09123123',
        'expiration' => NULL,
        'status' => 'Active',
        'roles' => 'Coach',
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'password' => '$2y$10$MI9ZYVFXUbdf97z4Lfi4tu99f56Yj2s29rFLu9LDcJ3j0E5.93o6K', // i4admin
        'remember_token' => Str::random(10),
    ];
});
