<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class AdminTasksController extends Controller
{
    public function TasksList() {
    	$tasks = Task::all();

    	return view("admin.tasks.list")->with([
    		'list' => $tasks,
		    'selectedMenuItem' => 'tasks-list',
	    ]);
    }

    public function EditTask($taskId) {
    	if('new' == $taskId) {
    		$task = new Task();
	    } else {
    		$task = Task::find($taskId);
	    }

	    return view("admin.tasks.edit")->with([
		    'task' => $task,
		    'selectedMenuItem' => 'tasks-list',
	    ]);
    }

    public function SaveTask($taskId, Request $request) {
	    if('new' == $taskId) {
		    $_isCreating = true;
		    $task = new Task();
	    } else {
		    $_isCreating = false;
		    $task = Task::find($taskId);
	    }

	    $task->category = $request->category;
	    $task->title = $request->title;
	    $task->description = $request->description;

	    if(strtotime($request->date_due)) {
		    $_obj = new \DateTime($request->date_due);
		    $task->due_date = $_obj->format('Y-m-d');
	    } else {
		    $task->due_date = null;
	    }

	    $task->priority = $request->priority;
	    $task->status = $request->status;
	    $task->percentage = $request->percentage;
	    $task->save();

	    if($_isCreating) {
		    $statusMessage = "New Task Created";
	    } else {
		    $statusMessage = "Task Updated";
	    }

	    return redirect('/admin/tasks/edit/'.$task->id)->with(["status" => $statusMessage]);

    }
}
