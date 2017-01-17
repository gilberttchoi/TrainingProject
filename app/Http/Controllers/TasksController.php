<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function store(Request $request)
    {
    	$task = new Task;
        $task->task_name = $request->title;
        $task->deadline = $request->deadline ;
        $task->task_detail = $request->body ;

        $task->save();

    }

    public function show(Request $request)
    {
    	return $request;
    }

    public function index()
    {	

    	$tasks = Task::all();
    	return view('pages.seeTasks', compact($tasks));
    }

}
