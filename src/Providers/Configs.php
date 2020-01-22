<?php

namespace ArtisanSdk\Blueprint\Providers;

use Illuminate\Support\ServiceProvider;

class Configs extends ServiceProvider
{
    /**
     * Package namespace.
     *
     * @var string
     */
    const PACKAGE = 'artisansdk/blueprint';

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/blueprint.php' => config_path(static::PACKAGE.'/blueprint.php'),
        ], 'config');
    }

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/blueprint.php',
            static::PACKAGE.'::blueprint'
        );
    }
}
