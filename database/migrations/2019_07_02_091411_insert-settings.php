<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $settings = [

            [
                "key" => "FACEBOOK_URL",
                "active" => true,
                "ar" => [ "value" => "https://www.facebook.com/" ],
                "en" => [ "value" => "https://www.facebook.com/" ],
            ],[
                "key" => "YOUTUBE_URL",
                "active" => true,
                "ar" => [ "value" => "https://www.youtube.com/" ],
                "en" => [ "value" => "https://www.youtube.com/" ],
            ],[
                "key" => "LINKEDIN_URL",
                "active" => true,
                "ar" => [ "value" => "https://www.linkedin.com/" ],
                "en" => [ "value" => "https://www.linkedin.com/" ],
            ],[
                "key" => "PINTEREST_URL",
                "active" => true,
                "ar" => [ "value" => "https://www.pinterest.com/" ],
                "en" => [ "value" => "https://www.pinterest.com/" ],
            ],[
                "key" => "TWITTER_URL",
                "active" => true,
                "ar" => [ "value" => "https://twitter.com/" ],
                "en" => [ "value" => "https://twitter.com/" ],
            ],[
                "key" => "GMAIL_URL",
                "active" => true,
                "ar" => [ "value" => "https://www.gmail.com/" ],
                "en" => [ "value" => "https://www.gmail.com/" ],
            ],[
                "key" => "INSTAGRAM_URL",
                "active" => true,
                "ar" => [ "value" => "https://www.instagram.com/" ],
                "en" => [ "value" => "https://www.instagram.com/" ],
            ],
            [
                "key" => "ADDRESS",
                "active" => true,
                "ar" => [ "value" => "Multikart Demo Store, Demo Store India 345-659(AR)" ],
                "en" => [ "value" => "Multikart Demo Store, Demo Store India 345-659(EN)" ],
            ],
            [
                "key" => 'EMAIL',
                "active" => true,
                "ar" => [ "value" => "Support@Fiot.Com"],
                "en" => [ "value" => "Support@Fiot.Com"],
            ],
            [
                "key" => 'CURRENCY',
                "active" => true,
                "ar" => [ "value" => "جنيه مصرى"],
                "en" => [ "value" => "EGP"],
            ],
            [
                "key" => 'FAX',
                "active" => true,
                "ar" => [ "value" => "123456"],
                "en" => [ "value" => "123456"],
            ],[
                "key" => 'MOBILE',
                "active" => true,
                "ar" => [ "value" => "23-456-7898"],
                "en" => [ "value" => "23-456-7898"],
            ],[
                "key" => 'ABOUT',
                "active" => true,
                "ar" => [ "value" => "متجر"],
                "en" => [ "value" => "The Shop Center"],
            ],[
                "key" => 'MAP',
                "active" => true,
                "ar" => [ "value" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.6749317286335!2d31.287509151106715!3d29.96002752942083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583841178e7ebf%3A0xb1e7fbf3ce0b8e81!2sLodex%20Solutions!5e0!3m2!1sen!2seg!4v1605435411020!5m2!1sen!2seg" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>'],
                "en" => [ "value" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.6749317286335!2d31.287509151106715!3d29.96002752942083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583841178e7ebf%3A0xb1e7fbf3ce0b8e81!2sLodex%20Solutions!5e0!3m2!1sen!2seg!4v1605435411020!5m2!1sen!2seg" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>'],
            ],[
                "key" => 'WELCOME_TITLE',
                "active" => true,
                "ar" => [ "value" => 'Lodex Cart (Arabic)'],
                "en" => [ "value" => 'Lodex Cart (English)'],
            ],[
                "key" => 'LOGO',
                "active" => true,
                "ar" => [ "value" => 'assets/frontend/images/icon/logo.png'],
                "en" => [ "value" => 'assets/frontend/images/icon/logo.png'],
            ],
        ];

        foreach ($settings as $setting) {
            $settingObj = new Setting($setting);
            $settingObj->key = $setting['key'] ;
            $settingObj->save();
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
