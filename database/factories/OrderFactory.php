<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $userIds = User::where('role_id', 2)->pluck('id');
    $user_id = $faker->randomElement($userIds);

    while (User::where('id', $user_id)->first()->addresses->isEmpty()) {
        $user_id = $faker->randomElement($userIds);
    }

    $address_id = $faker->randomElement(User::where('id', $user_id)->first()->addresses->pluck('id'));

    return [
        'date'       => $faker->date('Y-m-d', 'now'),
        'user_id'    => $user_id,
        'address_id' => $address_id,
    ];
});
