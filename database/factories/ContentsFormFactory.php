<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'catchcopy' => $faker->realText(10),
        'recommend' => $faker->realText(10),
        'customer_id' => 1,
    ];
});
