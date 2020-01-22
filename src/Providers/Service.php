<?php

namespace ArtisanSdk\Blueprint\Providers;

use Illuminate\Support\ServiceProvider;
use Hmaus\DrafterPhp\Drafter;
use Parsedown;

class Service extends ServiceProvider
{
    /**
     * Bootstrap the package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'blueprint');

        $this->publishes([
            __DIR__.'/../../public' => public_path('vendor/blueprint'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/blueprint'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../../blueprint.apib' => base_path('blueprint.apib'),
        ], 'example');
    }

    /**
     * Register the package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Drafter::class, function () {
            return new Drafter(config(Configs::PACKAGE.'::blueprint.drafter'));
        });

        $this->app->singleton(Parsedown::class);
    }
}
