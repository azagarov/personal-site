<?php

namespace AdminLTE\Providers;

use Illuminate\Support\ServiceProvider;

class AdminLteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
	    $this->publishes([
		    base_path('vendor/almasaeed2010/adminlte/dist') => public_path('vendor/adminlte'),
		    base_path('vendor/almasaeed2010/adminlte/bower_components') => public_path('vendor/adminlte/plugins'),
	    ], 'adminlte-public');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
	    include_once __DIR__."/../Helpers/AdminLte.php";
    }
}
