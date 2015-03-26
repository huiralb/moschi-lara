@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<h2>Create product</h2>
				<hr>
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
				{!! Form::open(['url'=>'item', 'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) !!}

					{!! Form::hidden('user_id', Auth::user()->id) !!}
					{!! Form::hidden('imageOnly', 0) !!}


				<div class="form-group">
						{!! Form::label('name','Name:', ['class'=>'col-sm-4']) !!}
						<div class="col-sm-8">
							{!! Form::text('name', null, ['class'=>'form-control']) !!}
						</div>
					</div>


					<div class="form-group">
						{!! Form::label('category','Category:', ['class'=>'col-sm-4']) !!}
						<div class="col-sm-8">
							<select class="form-control text-capitalize" name="category_id" required>
								<option value="">-- Select --</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('description','Description:', ['class'=>'col-sm-4']) !!}
						<div class="col-sm-8">
							{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
						</div>
					</div>


					<div class="form-group">
						{!! Form::label('image','Images:', ['class'=>'col-sm-4']) !!}
						<div class="col-sm-8">
							{!! Form::input('file', 'images[]', null, ['multiple'=>true,'class'=>'form-control',
							'accept'=>'image/*']) !!}
						</div>
					</div>


					<div class="form-group">
						{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
					</div>

				{!! Form::close() !!}
			</div>
		</div>

	</div>
@stop