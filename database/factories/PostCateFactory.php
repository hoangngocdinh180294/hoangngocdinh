<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\PostCategory;
use Faker\Generator as Faker;

$factory->define(App\Models\PostCategory::class, function (Faker $faker) {
    return [
        'post_id'=>$faker->numberBetween($min = 51, $max = 100),
        'category_id'=>$faker->numberBetween($min = 1, $max = 10)
    ];
});
