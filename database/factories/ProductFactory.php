<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code'        => $faker->isbn13,
        'name'        => $faker->name,
        'brand'        => $faker->name,
        'description' => $faker->paragraph(6),
        'price'       => $faker->numberBetween(10000, 9999999),
        'category_id' => $faker->numberBetween(4, 9),
    ];
});
