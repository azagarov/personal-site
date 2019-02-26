<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\Blog;
use App\Services\BlogService;

class AppServiceProvider extends ServiceProvider
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
	    $this->app->singleton(Blog::class, BlogService::class );
    }
}
