<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Testimonial::class, function (Faker $faker) {
    return [
        //
        'content' =>$faker->sentence($nbWords = 3, $variableNbWords = true),
        'author' => $faker->sentence($nbWords = 3, $variableNbWords = true),      
        'avatar' => $faker->imageUrl($width = 640, $height = 480), 
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
