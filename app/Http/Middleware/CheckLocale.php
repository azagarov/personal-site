<?php

namespace App\Http\Middleware;

use Closure;

class CheckLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//var_dump("We are here");

	    if($request->session()->has('__currentLocale')) {
		    \App::setLocale($request->session()->get('__currentLocale'));
	    } elseif ($request->cookie('__currentLocale')) {
		    \App::setLocale($request->cookie('__currentLocale'));
	    }

	    \View::share('__currentLocale', \App::getLocale());

        return $next($request);
    }
}
