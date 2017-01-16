<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TasksController extends Controller
{
    public function store(Request $request)
    {
    	return $request;	
    }

    public function show(Request $request)
    {
    	return $request;
    }

    public function index()
    {	

    	$tasks = \DB::select('select * from tasks');
    	return view('pages.seeTasks', compact($tasks));
    }

}
