<?php

use Faker\Generator as Faker;

$factory->define(App\Settings::class, function (Faker $faker) {
    return [
        'imeSajta'=>'Portfolio - Slišković',
        'title'=>'Portfolio',
        'adresa'=>'Beograd',
        'email'=>'andriasliskovic@gmail.com',
        'telefon'=>'38164xxxxx28',
        'theme'=>7,
    ];
});
