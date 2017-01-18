@extends('pages/layout')

@section('title')
<h1>This page is here to add data to the databse</h1>
@stop

@section('content') 

<h3>Add a task with this form</h3>
<form method="POST" action="/addTask/storeTask" >
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">	
		
		<label for="title">Task Title</label>
		<input type="text" name="title" class="form-control"></input>
	</div>

	<div class="form-group">	
		<label for="deadline">Deadline</label>
		<input type="date" name="deadline" class="form-control"></input>
	</div>

	<div class="form-group">	
		<label for="detail">Task Description</label>
		<textarea name="detail" class="form-control"></textarea>
	</div>

	<div class="form-group">		
		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
	</div>


</form>

@stop	