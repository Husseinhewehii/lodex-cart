<?php

use Faker\Generator as Faker;
use App\Models\ProductImage ;
$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        "image" => 'https://png.pngtree.com/png-clipart/20190516/original/pngtree-healthy-food-png-image_3776802.jpg',
    ];
});
