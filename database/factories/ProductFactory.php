<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'ref' => $faker->word(),
        'size' => $faker->numberBetween($min = 1, $max = 4),
        'code' => $faker->numberBetween($min = 1, $max = 2),
        'status' => $faker->numberBetween($min = 1, $max = 2)
    ];
});
