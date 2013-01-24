<?php namespace jtgrimes\Laravelodbc;

use Illuminate\Support\ServiceProvider;

class ODBCServiceProvider extends ServiceProvider {

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
		$this->package('jtgrimes/laravelodbc');
        $factory = $this->app['db.factory'];
        $factory->add('odbc',array("Connector"=>"jtgrimes\Laravelodbc\ODBCConnector","Connection"=>"jtgrimes\Laravelodbc\ODBCConnection"));
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
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