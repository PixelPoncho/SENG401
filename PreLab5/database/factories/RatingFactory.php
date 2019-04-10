<?php

use Faker\Generator as Faker;

$factory->define(App\Rating::class, function (Faker $faker) {
  return [
    //
    'user_id' => $faker->randomDigitNotNull,
    'book_id' => $faker->randomDigitNotNull,
    'rating' => $faker->numberBetween($min = 1, $max = 5),
  ];
});
