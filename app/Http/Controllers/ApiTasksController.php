<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Transformers\TaskTransformer;
use App\Transformers\Transformer;
use Carbon\Carbon;

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

		if( ! $task ){
			return $this->respondNotFound();

		}
		return $this->respond([
			'data' => $this->taskTransformer
			->transform($task)
			]);
	}	

	public function update($id, Request $request)
	{
		$task = Task::find($id); 

		if( ! $task ){
			return $this->respondNotFound();
		}

		if( ! $request->input('title') or ! $request->input('detail') or ! $request->input('deadline') ){
			return $this->respondInvalidRequest('Parameters failed validation. Parameters could be missing.');
		}

		$task['title'] = $request->input('title');
		$task['deadline'] = $request->input('deadline');
		$task['detail'] = $request->input('detail');
		$task['updated_at'] = Carbon::now('Europe/Paris');

		return  $this->respond([
			'data' => $this->taskTransformer
			->transform($task)
			]);

	}

	public function destroy()
	{
		;
	}

	public function edit()
	{
		$task = Task::find($id); 

		if( ! $task ){
			return $this->respondNotFound();
		}

		if( ! $request->input('title') and ! $request->input('detail') and ! $request->input('deadline') ){
			return $this->respondInvalidRequest('Parameters failed validation.');
		}

		($request->input('title')) ? $task['title'] = $request->input('title') : 0;
		($request->input('deadline')) ? $task['deadline'] = $request->input('deadline') : 0;
		($request->input('deadline')) ? $task['detail'] = $request->input('detail') : Null;
		$task['updated_at'] = Carbon::now('Europe/Paris');

		return  $this->respond([
			'data' => $this->taskTransformer
			->transform($task)
			]);
	}


}	


//TODO finish coding the other api methods