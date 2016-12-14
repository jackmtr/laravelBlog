<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article; 

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation(); 
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose the navigation bar
     */
    private function composeNavigation(){

        //i.e. i want to register a view composer 
        view()->composer('partials.nav', function($view){
            $view->with('latest', Article::latest()->first());
        });
        //if you need a big function, dont do it here
        //view()->composer('partials.nav', 'App\Http\Composers\NavigationComposer');
    }
}
