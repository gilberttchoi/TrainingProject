<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function store(Request $request)
    {
    	$task = new Task;
        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->detail = $request->detail;

        $task->save();

        return redirect()->action('TasksController@index');

    }

    public function index()
    {	
    	$tasks = Task::all()->take(20);
    	return view('pages.seeTasks', compact('tasks'));
    }

}
    