<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductSize;
use Faker\Generator as Faker;

$factory->define(ProductSize::class, function (Faker $faker) {
    return [
        'size'  => $faker->randomFloat(2, 10, 30) . ' x ' . $faker->randomFloat(2, 10, 30),
 		'quantity'    => $faker->numberBetween(20, 200),
    ];
});
