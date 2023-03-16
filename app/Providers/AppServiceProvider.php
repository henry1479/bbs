<?php

namespace App\Providers;

use App\Services\MessagesServices\Contracts\MessagesService;
use App\Services\MessagesServices\Messager;
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
        $this->app->bind(MessagesService::class, Messager::class);


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
