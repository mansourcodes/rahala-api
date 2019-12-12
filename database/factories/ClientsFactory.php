<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\clients;
use Faker\Generator as Faker;

$factory->define(clients::class, function (Faker $faker) {
    return [
        'client_name' => $faker->firstNameMale . ' Travel',
        'client_alian' => strtolower($faker->firstNameMale . '_Travel'),
        'logo_img' => $faker->image('public/storage/images', 200, 200, null, false),
        'contact_wp_1' => $faker->phoneNumber,
        'contact_wp_2' => $faker->phoneNumber,
        'locations' => $faker->latitude . ',' . $faker->longitude,
    ];
});
