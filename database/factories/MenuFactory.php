<?php

use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'putanja'=>$faker->url

    ];
});
