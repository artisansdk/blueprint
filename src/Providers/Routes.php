<?php

namespace ArtisanSdk\Blueprint\Providers;

use Illuminate\Support\ServiceProvider;

class Routes extends ServiceProvider
{
    /**
     * Bootstrap the package services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('blueprint.path')) {
            $this->loadRoutesFrom(__DIR__.'/../Http/Routes/web.php');
        }
    }

    /**
     * Register the package services.
     *
     * @return void
     */
    public function register()
    {
    }
}
