<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Matching;
use Faker\Generator as Faker;

$factory->define(App\Matching::class, function (Faker $faker) {
    return [
        'apply_id' => factory(App\User::class)->create()->id,
        'approve_id' => factory(App\User::class)->create()->id,
        'offer_id' => factory(App\Offer::class)->create()->id,
    ];
});
