<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        "date" => $faker->dateTime,
        "description" => $faker->text,
        "amount" => $faker->randomFloat(2, 5, 2000000),
    ];
});
