<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Feature;

class InsertFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $features = [
            [
                "active" => true,
                "ar" => [
                    "title" => 'First Title Arabic',
                    "description" => 'First Description Arabic',
                    ],
                "en" => [
                    "title" => 'First Title English',
                    "description" => 'First Description English',
                ]
            ],[
                "active" => true,
                "ar" => [
                    "title" => 'Second Title Arabic',
                    "description" => 'Second Description Arabic',
                    ],
                "en" => [
                    "title" => 'Second Title English',
                    "description" => 'Second Description English',
                ]
            ],[
                "active" => true,
                "ar" => [
                    "title" => 'Third Title Arabic',
                    "description" => 'Third Description Arabic',
                    ],
                "en" => [
                    "title" => 'Third Title English',
                    "description" => 'Third Description English',
                ]
            ],
        ];

        foreach ($features as $feature) {
            $featureObj = new Feature($feature);
            $featureObj->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
