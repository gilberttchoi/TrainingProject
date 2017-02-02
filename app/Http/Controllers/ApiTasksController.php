<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Transformers\TaskTransformer;
use App\Transformers\Transformer;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
		//Maybe could be better to remove data encapsulation
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

	public function destroy($id, Request $request)
		{
		$task = Task::find($id);  //could be nice to shorten using findOrFail($id)->delete(); and catch the exception

		if( ! $task )
		{
			return $this->respondNotFound();
		}

		$task->delete();

		return $this->respondDeleted('Task successfully deleted');
	}

	//Need to figure out what to do with this
	public function edit($id, Request $request)
	{
		/*$task = Task::find($id); 

		if( ! $task ){
			return $this->respondNotFound();
		}

		if( ! $request->input('title') and ! $request->input('detail') and ! $request->input('deadline') ){
			return $this->respondInvalidRequest('Parameters failed validation.');
		}

		($request->input('title')) ? $task['title'] = $request->input('title') : Null;
		($request->input('deadline')) ? $task['deadline'] = $request->input('deadline') : Null;
		($request->input('deadline')) ? $task['detail'] = $request->input('detail') : Null;
		$task['updated_at'] = Carbon::now('Europe/Paris');

		return  $this->respond([
			'data' => $this->taskTransformer
			->transform($task)
			])*/;

	}


}	


//TODO finish coding the other api methods
//TODO create error codes (heritage) for auth and use auth for post method 