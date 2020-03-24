<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;


$factory->define(Client::class, function (Faker $faker) {

    $contact_object = [
        [
            "branch" => "الجنبية",
            "type" => "whatsapp",
            "value" => "36371726",
        ],
        [
            "branch" => "",
            "type" => "whatsapp",
            "value" => "36399926",
        ],
        [
            "branch" => "",
            "type" => "instagram",
            "value" => "_mansourcodes_",
        ],
        [
            "branch" => "",
            "type" => "map",
            "value" => "26.230091,50.562944",
        ],
        [
            "branch" => "العاصمة",
            "type" => "whatsapp",
            "value" => "36371726",
        ],
        [
            "branch" => "",
            "type" => "twitter",
            "value" => "_mansourcodes_",
        ],
        [
            "branch" => "",
            "type" => "youtube",
            "value" => "_mansourcodes_",
        ],
        [
            "branch" => "",
            "type" => "phone",
            "value" => "17123465",
        ],
        [
            "branch" => "",
            "type" => "map",
            "value" => "26.230245,50.562944",
        ],
    ];


    return [
        'client_name' => $faker->firstNameMale . ' Travel',
        'client_alian' => strtolower($faker->firstNameMale . '_Travel'),
        'logo_img' => 'https://i.picsum.photos/200/200.jpg',
        'contact' => json_encode($contact_object),
        'db_name' => 'a',
        'db_user' => 'a',
        'db_pass' => 'a',
        'db_host' => 'a'
    ];
});
