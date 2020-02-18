<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\ProjectImage::class, function (Faker $faker) {
    return [
        //
        'project_id' => $faker->numberBetween($min = 1, $max = 50),
        'image' =>$faker->imageUrl($width = 640, $height = 480),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
