<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HistDetailServiceProvider extends ServiceProvider
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
            'histDetail',
            'App\Http\Components\HistDetail'
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
