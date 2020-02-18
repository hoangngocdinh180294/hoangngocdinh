<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Customer_Contact;
use Faker\Generator as Faker;

$factory->define(App\Models\Customer_Contact::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'phone'=>$faker->phoneNumber,
        'full_name'=>$faker->name,
        'body'=>$faker->text
    ];
});
