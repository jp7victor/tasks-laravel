{{ Form::open(['url' => '/tasks', 'class' => 'form']) }}

	<div class="form-group">

		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control']) }}
		{{ $errors->first('title') }}

	</div>

	<div class="form-group">

		{{ Form::label('body', 'Body:') }}
		{{ Form::textarea('body', null, ['class' => 'form-control']) }}
		{{ $errors->first('body') }}

	</div>

	<div class="form-group">

		{{ Form::label('user_id', 'Assign To:') }}
		{{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}

	</div>

	<div class="form-group">

		{{ Form::submit('Create Task') }}

	</div>

{{ Form::close() }}