<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HogeServiceProvider extends ServiceProvider
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
            'hoge',
            'App\Http\Components\Hoge'
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
