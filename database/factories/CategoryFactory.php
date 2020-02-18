<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
        'slug'=>$faker->sentence($nbWords = 3, $variableNbWords = true)
    ];
});
