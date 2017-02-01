<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Transformers\TaskTransformer;
use App\Transformers\Transformer;

class ApiTasksController extends ApiController
{
	private $taskTransformer;

	function __construct(TaskTransformer $taskTransformer){
		$this->taskTransformer = $taskTransformer;

		$this->middleware('auth.basic', ['only' => 'post']);
	}

	public function index()
	{
		$tasks = Task::all();
		if(! $tasks){
			return $this->respondNotFound();
		}
		return $this->respond([
			'data' => $this->taskTransformer->transformCollection($tasks->toArray())
			]);
	}

	public function store(Request $request)
	{
		if( ! $request->input('title') or ! $request->input('detail') or ! $request->input('deadline') ){
			return $this->respondInvalidRequest('Parameters failed validation.');
		}

		Task::create($request->input());

		return $this->respondCreated('Task successfully created');
	}

	public function create()
	{
		;
	}	

	public function show($id)
	{
		$task = Task::find($id);

		if( ! $task){
			return $this->respondNotFound();
		}

		return $this->respond([
			'data' => $this->taskTransformer->transformCollection([$task])
			]);
	}	

	public function update()
	{
		;
	}

	public function destroy()
	{
		;
	}

	public function edit()
	{
		;
	}


}	


//TODO finish coding the other api methods