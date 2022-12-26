<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Feature;
use Faker\Generator as Faker;

$factory->define(Feature::class, function (Faker $faker) {
    $feature = [
        'en'=> [
            'title' => $faker->name,
            'description' => $faker->realText($maxNbChars = 50, $indexSize = 2)
        ],
        'ar'=> [
            'title' => $faker->name,
            'description' => $faker->realText($maxNbChars = 50, $indexSize = 2)
        ],

        'icon' => $faker->imageUrl(),
        'active' => true,
    ];

    return $feature;
});
