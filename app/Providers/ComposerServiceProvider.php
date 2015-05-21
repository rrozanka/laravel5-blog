<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ComposerServiceProvider
 *
 * @package App\Providers
 */
class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('admin', 'App\Http\ViewComposers\AdminComposer');
        \View::composer('admin.articles.partials.form', 'App\Http\ViewComposers\ArticlesFormComposer');
        \View::composer('admin.users.partials.form', 'App\Http\ViewComposers\UsersFormComposer');
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
