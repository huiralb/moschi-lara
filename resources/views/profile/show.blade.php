@extends('layouts.app')

@section('content')
	<div class="container">

		<ul class="list-unstyled">
			<li>Username:  {{ Auth::user()->name }} </li>
			<li>Email:  {{ Auth::user()->email }} </li>
		</ul>
		{!! Form::open(['method' => 'delete', 'route' => ['user.destroy', Auth::user()->id]]) !!}
			<a class="btn btn-primary btn-xs" href="{{ URL::route('user.edit', ['id' => Auth::user()->id]) }}">Edit</a>

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

		<hr/>

		<h1>My Products</h1>
		<p><a class="btn btn-xs btn-primary" href="{{ URL::to('/item/create') }}">Add Product</a></p>
		@if(! $products->isEmpty() )
			<div class="row">
				
			@foreach($products as $product)
				<div class="col-sm-12 media" style="margin-bottom:1em">
					@foreach($product->image() as $image)
					<a class="media-left" href="#">
						<img class="media-object" src="{{ URL::asset('public/images/products/' . $image->name) }}" alt="{{ $image->name }}">
					</a>
					@endforeach
					<div class="media-body">
						<h4 class="media-heading">{{ $product->name }}</h4>
						<p>{{ $product->description }}</p>
					</div>
				</div>
			@endforeach
			</div>
		@else
			<p>No product items are loaded !!</p>
		@endif

	</div>{{-- End container --}}
@endsection
