@extends('layouts.master')

@section('content')
<h1>All Tasks</h1>

 <div class="col-md-6">
	
	@foreach($tasks as $task)

		<li class="list-group-item {{ $task->completed ? 'completed' : ''}}">
			
			<a href="/{{ $task->user->username }}/tasks"><img src="{{ gravatar_url($task->user->email) }}" alt="{{ $task->user->username }}"></a>

			{{ $task->title }}
			
			{{ Form::model($task, ['class' => 'task-update-form', 'method' => 'PATCH', 'route' => ['tasks.update', $task->id]]) }}
				{{ Form::checkbox('completed') }}
				{{ Form::submit('Update') }}
			{{ Form::close() }}
		</li>

	@endforeach

</div>


<div class="col-md-6">
@if (isset($users))

	<h3>Add New Task</h3>
	@include('tasks/partials/_form')
	@endif

@stop

</div>

