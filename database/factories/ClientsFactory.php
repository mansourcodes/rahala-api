<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

// website http://placekitten.com/ is down
$fakerfactory = \Faker\Factory::create();
$face_img = $fakerfactory->image('public/storage/images', 200, 200, 'people', false);
error_log('img url : ' . $face_img);
dd();
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

    global $face_img;

    error_log('img url : ' . $face_img);

    return [
        'client_name' => $faker->firstNameMale . ' Travel',
        'client_alian' => strtolower($faker->firstNameMale . '_Travel'),
        'logo_img' => $face_img,
        'contact' => json_encode($contact_object),
        'db_name' => '',
        'db_user' => '',
        'db_pass' => '',
        'db_host' => ''
    ];
});
