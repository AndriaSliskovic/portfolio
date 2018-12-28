<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Projekti::class, function (Faker $faker) {
    $naslov=$faker->sentence($nbWords = 6, $variableNbWords = true);
    $slug=Str::slug($naslov);
    return [
        'naslov'=>$naslov,
        'slug'=>$slug,
        'podnaslov'=>$faker->sentence($nbWords = 9, $variableNbWords = true),
        'sadrzaj'=>$faker->paragraph($nbSentences = 40, $variableNbSentences = true),
        'vremeIzrade'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'skill'=>$faker->numberBetween($min = 1, $max = 5),
        'slika'=>$faker->imageUrl($width = 640, $height = 480),
        'linkProjekta'=>$faker->url,
        'linkGitHuba'=>$faker->url,
        'test'=>$faker->url,
        'category_id'=>$faker->biasedNumberBetween(1,3),




    ];
});
