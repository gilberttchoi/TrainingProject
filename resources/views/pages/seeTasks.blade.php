@extends('pages\layout')

@section('content')	
<h1>All tasks</h1>
<ul class="list-group">
	@foreach($tasks as $task)

		<li class="list-group-item">{{ $task }}</li>

	@endforeach
</ul>
@stop