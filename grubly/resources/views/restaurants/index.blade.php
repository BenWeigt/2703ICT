@extends('layouts/app')

@section('content')

	<h2> Restaurants </h2>
	@foreach ($restaurants as $restaurant)
		<div class="restaurant">
			<a href="restaurants/{{$restaurant->id}}"><li>{{$restaurant->name}}</li></a>
		</div>
	@endforeach

@endsection