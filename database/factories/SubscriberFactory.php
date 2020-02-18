<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Subcribers;
use Faker\Generator as Faker;

$factory->define(App\Models\Subcribers::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail
    ];
});
