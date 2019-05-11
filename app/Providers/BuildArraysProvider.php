<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BuildArrayHelper;

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
        $this->app->bind('BuildQuestionArray', function(Application $app){
            return new BuildArray();
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
