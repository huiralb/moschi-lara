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
		<a class="btn btn-xs btn-primary" href="{{ URL::to('/item/create') }}">Add Product</a>
		@if(! $products->isEmpty() )
			@foreach($products as $product)
				<h3> {{ $product->name }} </h3>
				@foreach($product->image() as $image)
					<img src="{{ URL::asset('public/images/products/' . $image->name) }}" alt="{{ $image->name }}"/>
				@endforeach
				<p> {{ $product->description }} </p>
			@endforeach
		@else
			<p>No product items are loaded !!</p>
		@endif

	</div>{{-- End container --}}
@endsection