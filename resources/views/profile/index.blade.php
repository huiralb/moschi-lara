@extends('layouts.app')

@section('content')
	<div class="container">

		<ul class="list-unstyled">
			<li>Username:  {{ Auth::user()->name }} </li>
			<li>Email:  {{ Auth::user()->email }} </li>
		</ul>
		<p><a class="btn btn-primary btn-xs" href="{{ URL::route('user.edit', ['id' => Auth::user()->id]) }}">Edit</a></p>

		{!! Form::open(['method' => 'delete', 'route' => ['user.destroy', Auth::user()->id]]) !!}
			<button type="submit" class="btn btn-danger btn-xs">Delete</button>
		{!! Form::close() !!}
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

	</div>
@endsection