@extends('layouts.app')

@section('content')
	<div class="container">

		{!! Form::model($user, ['class' => 'form-horizontal' ,'method' => 'put', 'route' => ['user.update', Auth::user()->id] ]) !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			<legend>Edit Profile</legend>
			<div class="form-group">
				<label class="col-md-4 control-label">Username</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
						Change
					</button>
					<a href="{{ URL::previous() }}" class="btn btn-danger" style="margin-right: 15px;">
						Cancel
					</a>

				</div>
			</div>
		{!! Form::close() !!}
	</div>
@endsection