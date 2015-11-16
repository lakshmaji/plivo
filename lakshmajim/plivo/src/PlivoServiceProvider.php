<?php namespace lakshmajim\plivo;

use Illuminate\Support\ServiceProvider;

class PlivoServiceProvider extends ServiceProvider
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
        //
            $this->app['plivo'] = $this->app->share(function($app) {
            return new Plivo;
        });
    }
}
