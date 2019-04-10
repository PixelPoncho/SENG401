<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
  return [
    //
    'user_id' => $faker->randomDigitNotNull,
    'title' => $faker->sentence,
    'description' => $faker->paragraph,
  ];
});
