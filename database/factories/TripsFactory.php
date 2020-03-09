<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trip;
use App\Client;
use Faker\Generator as Faker;





$factory->define(Trip::class, function (Faker $faker) {

    $code = rand(100, 200);
    $travel_by = ['BUS', 'FLIGHT', 'OTHER'];
    $travel_by = $travel_by[rand(0, 2)];

    $food_options = ['ALL', 'B_ONLY', 'D_ONLY', 'B_AND_D', 'NONE'];
    $food_options = $food_options[rand(0, 4)];

    $age_range = ['adult', 'teen', 'boy', 'baby', 'infant'];

    $random_clients = Client::all()->pluck('id')->toArray();

    return [
        'client_id' => $faker->randomElement($random_clients),

        'code' => 'R' . $code,
        'name' => $faker->sentence(7) . $faker->date('d/m/Y'),
        'cities' => $faker->randomElement($GLOBALS["random_cities"]) . ',' . $faker->randomElement($GLOBALS["random_cities"]),
        'desc' => $faker->paragraph,

        'travel_by' => $travel_by,
        'airlines' => $faker->randomElement($GLOBALS["random_airlines"]),
        'hotels' => '5 Stars Hotel',

        'travel_date' => $faker->date(),
        'num_of_days' => rand(3, 20),
        'num_of_nights' => rand(3, 20),
        'return_date' => $faker->date(),

        'travel_time' => $faker->time('h:ia'),
        'food_options' => $food_options,

        'trippers_limit' => rand(100, 200),
        'trippers_booked' => rand(80, 100),


        'own_bed_age_range' => $age_range[rand(2, 4)],
        'own_chair_age_range' => $age_range[rand(1, 3)],

        'adult_price' => $faker->randomFloat(2, 100, 400),
        'teen_price' => $faker->randomFloat(2, 80, 100),
        'boy_price' => $faker->randomFloat(2, 60, 70),
        'baby_price' => $faker->randomFloat(2, 40, 60),
        'infant_price' => $faker->randomFloat(2, 10, 40),

        'baby_start_age' => 2,
        'boy_start_age' => rand(5, 6),
        'teen_start_age' => rand(7, 8),
        'adult_start_age' => rand(11, 12),

        'ex_custom_things' => '{}',
        'created_date' => $faker->dateTime,

        'trip_path' => '{}',

    ];
});
