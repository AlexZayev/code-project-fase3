<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Sysproject\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Sysproject\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'responsible' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'obs'	=> $faker->sentence,
    ];
});

$factory->define(Sysproject\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        'owner_id' => rand(1,10),
        'client_id' => rand(1,10),
        'name' => $faker->word,
        'description' => $faker->sentence,
        'progress' => rand(1,100),
        'status' => rand(1,3),
        'due_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+3 years', $timezone = date_default_timezone_get()),
    ];
});

$factory->define(Sysproject\Entities\ProjectNote::class, function (Faker\Generator $faker) {
    return [
        'project_id' => rand(1,10),
        'title' => $faker->word,
        'note' => $faker->paragraph,
    ];
});

$factory->define(Sysproject\Entities\ProjectTask::class, function (Faker\Generator $faker) {
    return [
        'project_id' => rand(1,10),
        'name' => $faker->word,
        'start_date' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = date_default_timezone_get()),
        'due_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+3 years', $timezone = date_default_timezone_get()),
        'status' => rand(1,3),
    ];
});
