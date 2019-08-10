<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ShowHistsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'hists',
            'App\Http\Components\ShowHists'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
      
    }
}
