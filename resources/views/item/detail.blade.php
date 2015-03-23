@extends('layouts.app')

@section('content')
	<section id="item-detail">
		<div class="container">
			<div class="media">
				@foreach($item->image() as $image)
				<a class="pull-left" href="#">
					<img class="media-object" src="{{ URL::asset('public/images/products') . '/' . $image->name }}" alt="{{ $item->name }}">
				</a>
				@endforeach
				<div class="media-body">
					<h2 class="media-heading">{{ $item->name }}</h2>
					<p>{{ $item->description }}</p>
				</div>
			</div>
		</div>
	</section>
@endsection