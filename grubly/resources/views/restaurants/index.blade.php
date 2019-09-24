@extends('layouts/app')
@section('content')
	@isrestaurant
		<section class="own-restaurant">
			@include('components.restaurantpreview', ['restaurant' => grubly\Restaurant::find(\Auth::user()->id)])
		</section>
	@endisrestaurant
	@can ('viewAny', grubly\Restaurant::class)
		<section class="pending-restaurants">
			<h2> Restaurants Pending Verification</h2>
			@foreach (grubly\Restaurant::allUnverified() as $restaurant)
				@include('components.restaurantpreview', ['restaurant' => $restaurant])
			@endforeach
		</section>
	@endcan
	<section class="restaurant-list">
		@foreach (grubly\Restaurant::allVerified() as $restaurant)
			@include('components.restaurantpreview', ['restaurant' => $restaurant])
		@endforeach
	</section>
@endsection