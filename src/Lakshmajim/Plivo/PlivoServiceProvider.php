<?php 

// Define namespace
namespace Lakshmajim\Plivo;

// Include namespaces
use Illuminate\Support\ServiceProvider;


/**
 * Plivo - A package integrating plivo SMS
 * with Laravel 4 framework applications
 *
 * @author     lakshmaji 
 * @package    Plivo
 * @version    1.0.0
 * @since      Class available since Release 1.0.0
 */
class PlivoServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('lakshmajim/plivo');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['plivo'] = $this->app->share(function($app) {
			return new Plivo;
		});

		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Plivo', 'Lakshmajim\Plivo\Facades\Plivo');
		});

		//php artisan config:publish --path="workbench/servebaba/plivo/src/config" servebaba/plivo

		// Get config loader
		$loader = $this->app['config']->getLoader();

		// Get environment name
		$env = $this->app['config']->getEnvironment();

		// Add package namespace with path set, override package if app config exists in the main app directory
		if (file_exists(app_path() .'/config/packages/lakshmajim/plivo')) {
			$loader->addNamespace('plivo', app_path() .'/config/packages/lakshmajim/plivo');
		} else {
			$loader->addNamespace('plivo',__DIR__.'/../../config');
		}

		// Load package override config file
		$plivo = $loader->load($env,'plivo','plivo');

		// Override value
		$this->app['config']->set('plivo::plivo',$plivo);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
// end of class PlivoServiceProvider
// end of file PlivoServiceProvider.php
