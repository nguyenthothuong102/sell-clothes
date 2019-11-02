<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $productIds = Product::pluck('id');
    $userIds    = User::where('role_id', 2)->pluck('id');

    return [
        'rating' => $faker->numberBetween(1, 5),
        'nickname'       => $faker->firstName,
        'title'          => $faker->text(60),
        'content'        => $faker->realText(),
        'product_id'     => $faker->randomElement($productIds),
        'user_id'        => $faker->randomElement($userIds),
    ];
});
