<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'status' => '承認済み',
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        }
    ];
});
