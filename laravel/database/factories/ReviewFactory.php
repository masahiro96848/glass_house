<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'title' => realText(20),
        'star' => numberBetween(1, 5),
        'body'=> realText(300),
        'reviewer_id' => factory(User::class)->create()->id,
        'reviewed_id' => factory(User::class)->create()->id,
    ];
});
