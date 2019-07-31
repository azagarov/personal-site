<?php

namespace Portfolio\Providers;

use Portfolio\Facades\PortfolioFacadeAccessor;
use Illuminate\Support\ServiceProvider;

use Portfolio\Contracts\PortfolioService as PortfolioContract;
use Portfolio\PortfolioService;

use Portfolio\Contracts\PortfolioEditableService as PortfolioEditableContract;
use Portfolio\PortfolioEditableService;

class PortfolioServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
	    $this->app->singleton(PortfolioContract::class, PortfolioService::class );
	    $this->app->singleton(PortfolioEditableContract::class, PortfolioEditableService::class );
	    $this->app->bind('portfolio', PortfolioFacadeAccessor::class);
    }
}
