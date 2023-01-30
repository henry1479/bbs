<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GardenApp\Garden;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Garden::class, function($app) {
            return new Garden();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
