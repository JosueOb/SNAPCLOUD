<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Publication;
use Faker\Generator as Faker;

$factory->define(Publication::class, function (Faker $faker) {
    return [
        'title'=>$faker->title,
        'description'=>$faker->realText($maxNbChars = 200, $indexSize = 2),
        'image'=>$faker->imageUrl($width = 640, $height = 480),
    ];
});
