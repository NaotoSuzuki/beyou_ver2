<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BuildQuestionArrayHelper;

class BuildQuestionArrayProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //引数はどうやってメソッドに渡すのかね？そもそも処理の流れがよくわかってないですが
        // $this->app->bind('BuildQuestionArray', function(Application $app){
        //     return new BuildQuestionArrayHelper();
        //   });
        //別のサイトのやりかたhttps://www.ritolab.com/entry/88
        $this->app->bind('BuildQuestionArray', 'BuildQuestionArrayHelper');
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
