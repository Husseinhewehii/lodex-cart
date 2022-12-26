<?php

use App\Models\Vendor;
use App\Models\Activity;
use App\Constants\VendorTypes ;
use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {
    $arabicFaker = Factory::create('ar_SA');
    $activities = Activity::all();
    $vendor = [
        'activity_id' => $faker->randomElement($activities)->id ,
        'logo' =>  'https://png.pngtree.com/png-clipart/20190516/original/pngtree-healthy-food-png-image_3776802.jpg',
        'active'    => $faker->boolean,
        'type'    => $faker->randomElement(VendorTypes::getTypeValue()),
    ];

    foreach (Config::get('app.locales') as $lang => $language) {
        $faker = $lang == 'ar' ? $arabicFaker : $faker;
        $vendor[$lang] = [
            'name'    => $faker->name,
        ];
    }

    return $vendor;

});


