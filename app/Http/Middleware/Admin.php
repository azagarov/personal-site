<?php

namespace App\Http\Middleware;

use App\Task;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
    	$user = Auth::user();

    	if(!in_array($user->email, self::$_adminEmails)) {
    		die("You are not an Admin!"); //TODO :: Create better behaviour
	    }

	    $this->_commonPart($user);
	    $this->_tasksPart($user);

        return $next($request);
    }


    private function _commonPart(User $user) {
    	\View::share('loggedUser', $user);
    }

    private function _tasksPart(User $user) {
	    $tasksData = [];

	    $collection = Task::whereIn('status', [Task::STATUS_OPEN, Task::STATUS_REOPENED, ]);

	    $tasks = $collection
		    ->orderBy('created_at', 'desc')
		    ->take(2)
		    ->get();
	    $tasksData['count'] = $collection->count();
	    $tasksData['recent'] = $tasks;


	    \View::share('_tasks', $tasksData);
    }


    private static $_adminEmails = [
    	'azagarov@mail.ru',
    	'azagarov@gmail.com',
    	'm555pa55@gmail.com',
    ];
}
