<?php

use Faker\Generator as Faker;

$factory->define(\App\Skills::class, function (Faker $faker) {
    return [
        'nazivSkilla'=>$faker->word,
        'vrednost'=>$faker->biasedNumberBetween($min = 10, $max = 100, $function = 'sqrt')
    ];
});
