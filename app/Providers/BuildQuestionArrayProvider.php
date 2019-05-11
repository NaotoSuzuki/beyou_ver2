<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Helpers\BuildQuestionArrayHelper;

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
        //別のサイトのやりかたhttps://www.ritolab.com/entry/88
        //5/12 いろんなやり方があるらしい　https://readouble.com/laravel/5.8/ja/container.html
        $this->app->bind('buildQuestionArray', 'App\Helpers\BuildQuestionArrayHelper');

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
