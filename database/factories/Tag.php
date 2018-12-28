<?php

use Faker\Generator as Faker;

$factory->define(\App\Tag::class, function (Faker $faker) {
    return [
        'tag'=>$faker->word(8),
        'category_id'=>$faker->biasedNumberBetween(1,3),
        'oblast_id'=>$faker->biasedNumberBetween(1,3),
        'opis'=>$faker->sentence(8),

    ];
});
