<?php
/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'author_id'=>$faker->numberBetween($min = 1, $max = 20),
        'title'=>$faker->sentence($nbWords = 8, $variableNbWords = true),
        'excerpt'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'body'=>$faker->sentence($nbWords = 154, $variableNbWords = true),
        'image'=>$faker->imageUrl($width = 640, $height = 480),
        'slug'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
        'meta_description'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'meta_keywords'=>$faker->sentence($nbWords = 6, $variableNbWords = true)
         ];
});

