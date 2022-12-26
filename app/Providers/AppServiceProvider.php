<?php

namespace App\Providers;

use App\Http\Services\FirebaseService;
use App\Http\Services\PushNotificationInterface;
use App\Http\Services\SendEmailInterface;
use App\Http\Services\SMSProviderInterface;
use App\Http\Services\NexmoSMSService;
use App\Http\Services\SendGridEmailService;
use App\Http\Services\PaymentGatewayInterface;
use App\Http\Services\PayfortService;
use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        View::composer('*', function ($view) {
            $defaultCategory = Category::query()->where('parent_id', '=', null)->first();

            if (!session()->get('main_category')) {
                session()->put('main_category', $defaultCategory);
            }

            $mainCategory = session()->get('main_category');


            $sideBarCategories = Category::where('parent_id', '=', null)->where('active', '=', true)->get();
            $navbarCategories = Category::where('parent_id', '=', $mainCategory->id)->where('active', '=', true)->get();
            $settings = Setting::all();
            $cartProducts = session()->get('cart') ?? [];

            $view->with([
                'sideBarCategories' => $sideBarCategories,
                'navbarCategories' => $navbarCategories,
                'settings' => $settings,
                'cartProducts' => $cartProducts
            ]);
        });

        Schema::defaultStringLength(191);
        $this->app->bind(SMSProviderInterface::class, NexmoSMSService::class);
        $this->app->bind(PaymentGatewayInterface::class, PayfortService::class);
        $this->app->bind(PushNotificationInterface::class, FirebaseService::class);
        $this->app->bind(SendEmailInterface::class, SendGridEmailService::class);
    }
}
