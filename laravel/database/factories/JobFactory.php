<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(20),
        'summary' => $faker->realText(200),
        'user_id' => factory(App\User::class)->create()->id,
    ];
});
