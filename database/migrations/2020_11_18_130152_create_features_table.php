<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('icon');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('feature_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("feature_id");
            $table->string("locale")->index();
            $table->string("title");
            $table->string("description");
            $table->unique(["feature_id", "locale"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
        Schema::dropIfExists('feature_translations');
    }
}
