<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Service;
use Faker\Generator as Faker;

$factory->define(App\Models\Service::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence($nbWords = 8, $variableNbWords = true),
        'body'=>$faker->text($maxNbChars = 200),
        'image'=>$faker->imageUrl($width = 640, $height = 480),
        'link'=>$faker->text
    ];
});
