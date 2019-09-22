@extends('layouts/app')

@section('content')

					@can('viewAll', grubly\Restaurant::class)
						<h2> Restaurants Pending Verification </h2>
						@foreach ($unverifiedRestaurants as $unverifiedRestaurant)
							<div class="unverified_restaurant">
								<a href="restaurants/{{$unverifiedRestaurant->id}}"><li>{{$unverifiedRestaurant->name}}</li></a>
							</div>
						@endforeach
					@endcan


					<h2> Restaurants </h2>
					@foreach ($restaurants as $restaurant)
						<div class="restaurant">
							<a href="restaurants/{{$restaurant->id}}"><li>{{$restaurant->name}}</li></a>
						</div>
					@endforeach

@endsection