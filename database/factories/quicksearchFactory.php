<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quicksearch;
use Faker\Generator as Faker;

$factory->define(Quicksearch::class, function (Faker $faker) {

    $travel_by = ['bus', 'flight', 'all'];
    $travel_by = $travel_by[rand(0, 2)];

    return [

        'search_label' => $faker->sentence(2),
        'cities' => $faker->randomElement($GLOBALS["random_cities"]) . ',' . $faker->randomElement($GLOBALS["random_cities"]),

        'travel_by' => $travel_by,
        'date_from' => $faker->date('Y-m-d', '-20month'),
        'date_to' => $faker->date('Y-m-d', '+20month'),


        'background_img' => 'https://i.picsum.photos/400/200.jpg',
        'background_color' => $faker->hexColor(),

        'order' => rand(3, 20),
    ];
});
