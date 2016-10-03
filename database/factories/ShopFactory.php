<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Shop::class, function (Faker\Generator $faker) {
    return [
        'foreign_id' => 0,
        'open_at' => $faker->date,
        'close_at' => $faker->date,
        'city' => $faker->name,
        'object_type' => 'shop',
        'shop_name_full' => $faker->name,
        'address' => $faker->address,
        'contacts' => $faker->text,
        'always_open' => true,
        'lat' => '',
        'lnt' => '',
    ];
});
