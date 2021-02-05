<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'title' => $faker->name(20, 30),
        'summary' => $faker->realText(200),
    ];
});
