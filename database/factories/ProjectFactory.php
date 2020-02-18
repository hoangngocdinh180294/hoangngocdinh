<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Project::class, function (Faker $faker) {
    return [
        //
        'author_id' => $faker->numberBetween($min = 1, $max = 20),
        'title' =>$faker->sentence($nbWords = 8, $variableNbWords = true),
        'body' => $faker->sentence($nbWords = 154, $variableNbWords = true),      
        'slug' => $faker->sentence($nbWords = 8, $variableNbWords = true),  
        'meta_description' => $faker->text,     
        'meta_keywords' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'status' => $faker->numberBetween($min = 1, $max = 11),     
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
