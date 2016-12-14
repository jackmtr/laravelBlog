<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * Something thats called after all service providers registered
     * i.e. call boot when the page is ready to go
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     * For binding things into laravels ioc/service container
     * i.e. everytime i request this class, build it up for me in this specific fashion
     * @return void
     */
    public function register()
    {
        //
    }
}
