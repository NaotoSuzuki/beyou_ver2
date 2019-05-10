<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\ArrayBuilder;

class BuildArraysProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //引数はどうやってメソッドに渡すのかね？そもそも処理の流れがよくわかってないですが
        $this->app->bind('indicateQuesstionsArray', function(Application $app){
            return new ArrayBuilder();
          });
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
