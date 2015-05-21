<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

/**
 * Class HelperServiceProvider
 *
 * @package App\Providers
 */
class HelperServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        App::bind('helper', function()
        {
            return new \App\Helpers();
        });
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
