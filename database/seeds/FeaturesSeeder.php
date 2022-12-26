<?php

use App\Models\Feature;
use Faker\Factory;
use Illuminate\Database\Seeder;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = factory( Feature::class,3)->create();
    }
}
