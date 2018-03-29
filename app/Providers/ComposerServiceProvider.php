<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer(
            ['layouts.includes.sidebar', 'settings.menus.index'],
            'App\Http\ViewComposers\SidebarComposer'
        );

        \View::composer('*', function ($view) {
            $view->with([
                'login_user' => auth()->check() ? auth()->user() : null
            ]);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
