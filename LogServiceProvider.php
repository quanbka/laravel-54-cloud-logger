<?php

namespace Megaads\Log;

use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/logging.php' => config_path('logging.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/logging.php', 'logging'
        );
        $this->app->singleton('log', function () {
            return new LogManager($this->app);
        });
    }
}
