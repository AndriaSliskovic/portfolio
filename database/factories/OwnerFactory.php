<?php

use Faker\Generator as Faker;

$factory->define(\App\Owner::class, function (Faker $faker) {
    return [
        'ime'=>'Andria',
        'prezime'=>'Slišković',
        'datRodjenja'=>"1970-08-07",
        'mesto'=>"Beograd",
        'iskustvo'=>$faker->numberBetween($min=50,$max=95),
        'email'=>'andriasliskovic@gmail.com',
        'slika'=>$faker->imageUrl($width = 400, $height = 200)
    ];
});
