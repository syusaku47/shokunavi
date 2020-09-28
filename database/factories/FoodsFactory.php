<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle(2),
        'price' => random_int(100,1000),
        'description' => $faker->sentences(10),
        'tips' => random_int(0,1),
        'category_id' => random_int(1,2),
        'content_id' => random_int(1,100),
        'hot' => random_int(0,1),
        'spice' => random_int(0,1),
    ];
});
