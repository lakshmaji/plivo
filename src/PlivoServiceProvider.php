<?php 

// Define namespace
namespace Lakshmajim\Plivo;

// Include namespaces
use Illuminate\Support\ServiceProvider;


/**
 * Plivo - A package integrating plivo SMS
 * with Laravel 5 framework applications
 *
 * @author     lakshmaji 
 * @package    Plivo
 * @version    1.2.0
 * @since      Class available since Release 1.2.0
 */
class PlivoServiceProvider extends ServiceProvider {

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
     * @return  void
     * @author  lakshmaji 
     * @package Plivo
     * @version 1.4.2
     * @since   Method available since Release 1.2.0
     */
    public function register()
    {
        if (method_exists(\Illuminate\Foundation\Application::class, 'singleton')) {
            $this->app->singleton('plivo', function($app) {
                return new Plivo;
            });
        } else {
            $this->app['plivo'] = $this->app->share(function($app) {
                return new Plivo;
            });
        }
    }
}
// end of class PlivoServiceProvider
// end of file PlivoServiceProvider.php
