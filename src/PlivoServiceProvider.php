<?php

// Define namespace

namespace Lakshmaji\Plivo;

// Include namespaces
use Illuminate\Support\ServiceProvider;

/**
 * Plivo - A package integrating plivo SMS
 * with Laravel 5 framework applications.
 *
 * @author     lakshmaji <lakshmajee88@gmail.com>
 *
 * @version    1.2.4
 *
 * @since      Class available since Release 1.0.0
 */
class PlivoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     *
     * @version 1.2.4
     *
     * @since   Method available since Release 1.0.0
     */
    public function boot()
    {
        // To publish configuration assets
        $this->publishes([
            __DIR__.'/config/plivo.php' => config_path('plivo.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     *
     * @author  lakshmaji <lakshmajee88@gmail.com>
     *
     * @version 1.2.4
     *
     * @since   Method available since Release 1.0.0
     */
    public function register()
    {
        if (method_exists(\Illuminate\Foundation\Application::class, 'singleton')) {
            $this->app->singleton('plivo', function ($app) {
                return new Plivo();
            });
        } else {
            $this->app['plivo'] = $this->app->share(function ($app) {
                return new Plivo();
            });
        }
    }
}
// end of class PlivoServiceProvider
// end of file PlivoServiceProvider.php
