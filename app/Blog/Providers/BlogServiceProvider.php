<?php

namespace Blog\Providers;

use App\Blog\Facades\BlogFacadeAccessor;
use Illuminate\Support\ServiceProvider;

use Blog\Contracts\BlogService as BlogContract;
use Blog\BlogService;

use Blog\Contracts\BlogEditableService as BlogEditableContract;
use Blog\BlogEditableService;

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
	    $this->app->singleton(BlogEditableContract::class, BlogEditableService::class );
	    $this->app->bind('blog', BlogFacadeAccessor::class);
    }
}
