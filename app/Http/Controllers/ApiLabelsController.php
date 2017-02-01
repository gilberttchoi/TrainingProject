<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Label;

class ApiLabelsController extends ApiController
{
	public function index()
	{
		$labels = Label::all();
		if(! $labels){
			return $this->respondNotFound();
		}
		return $this->respond([
			'data' => $labels
			]);
	}

	//TODO all the others usual methods are to be created
}
