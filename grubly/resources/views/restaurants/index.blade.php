@extends('layouts/app')

@section('content')

	@can ('viewAny', grubly\Restaurant::class)
		<h2> Restaurants Pending Verification</h2>
		@foreach (grubly\Restaurant::allUnverified() as $restaurant)
			<div class="restaurant">
				<a href="restaurants/{{$restaurant->id}}"><li>{{$restaurant->name}}</li></a>
			</div>
		@endforeach
	@endcan

	<h2> Restaurants </h2>
	@foreach (grubly\Restaurant::allVerified() as $restaurant)
		<div class="restaurant">
			<a href="restaurants/{{$restaurant->id}}"><li>{{$restaurant->name}}</li></a>
		</div>
	@endforeach
@endsection