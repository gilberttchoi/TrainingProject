@extends('pages/layout')

@section('title')
<h1>This page is here to add data to the databse</h1>
@stop

@section('content') 

<h3>Add a task with this form</h3>
<form method="POST" action="/add_data/dataAdder" >


	<div class="form-group">	
		Task title
		<input type="text" name="title" class="form-control"></input>
	</div>

	<div class="form-group">	
		Deadline
		<input type="date" name="deadline" class="form-control">	</input>
	</div>

	<div class="form-group">	
	Task description
		<textarea name="body" class="form-control">

		</textarea>
	</div>

	<div class="form-group">		
		<button type="submit" name="submit" class="btn btn-primary">
			Submit
		</button>
	</div>


</form>

@stop	