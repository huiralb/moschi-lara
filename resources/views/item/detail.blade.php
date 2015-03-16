@extends('layouts.app')

@section('content')
	<section id="item-detail">
		<div class="container">
			<div class="media">
				<a class="pull-left" href="#">
					<img class="media-object" src="{{ URL::asset('public').'/'. $item->image }}" alt="{{ $item->name }}">
				</a>
				<div class="media-body">
					<h2 class="media-heading">{{ $item->name }}</h2>
					<p>{{ $item->description }}</p>
				</div>
			</div>
		</div>
	</section>
@endsection