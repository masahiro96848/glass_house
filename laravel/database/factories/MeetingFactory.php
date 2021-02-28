<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Meeting::class, function (Faker $faker) {
    return [
        'meeting_id' => $faker->randomNumber(9),
        'topic' => $faker->text(10),
        'agenda' => $faker->text(20),
        'start_time' => $faker->datetime,
        'start_url' => $faker->url,
        'join_url' => $faker->url,
        'matching_id' => factory(App\Matching::class)->create()->id,
    ];
});
