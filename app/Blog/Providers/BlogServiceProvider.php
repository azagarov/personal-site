<?php

namespace Blog\Providers;

use Illuminate\Support\ServiceProvider;

use Blog\Contracts\BlogService as BlogContract;
use Blog\BlogService;

class BlogServiceProvider extends ServiceProvider
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
	    $this->app->singleton(BlogContract::class, BlogService::class );
	    $this->app->bind('blog', BlogService::class);
    }
}
