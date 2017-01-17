@extends('pages\layout')

@section('content')
<ul>
	<h1>All tasks</h1>
	@foreach($tasks as task)
		{{ $task->Task_Name }}
	@endforeach
</ul>
@stop