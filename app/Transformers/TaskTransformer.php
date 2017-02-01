<?php

namespace App\Transformers;

class TaskTransformer extends Transformer {

	public function transform($task)
	{
		return [
			'title' => $task['title'],
			'deadline' => $task['deadline'],
			'your mission' => $task['detail']
		]; 
	}
}	

