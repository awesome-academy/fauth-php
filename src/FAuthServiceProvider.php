<?php

namespace Framgia\Fauth;

use Illuminate\Support\ServiceProvider;
use Framgia\Fauth\Contracts\Factory;

class FAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Framgia\Fauth\Contracts\Factory', function ($app) {
            return new FAuthManager($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Factory::class];
    }
}
