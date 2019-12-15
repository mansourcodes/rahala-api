<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'client_name' => $faker->firstNameMale . ' Travel',
        'client_alian' => strtolower($faker->firstNameMale . '_Travel'),
        'logo_img' => $faker->image('public/storage/images', 200, 200, null, false),
        'contact_wp_1' => '97336371726',
        'contact_wp_2' => '97336371726',
        'locations' => $faker->latitude . ',' . $faker->longitude,
    ];
});
