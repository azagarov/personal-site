<?php

namespace App\Providers;

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
	    ], 'public');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
	    include_once app_path("Helpers/AdminLte.php");
    }
}
