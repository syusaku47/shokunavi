<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'catchcopy' => $faker->realText(10),
        'recommend' => $faker->realText(10),
        'customer_id' => 1,
    ];
});
