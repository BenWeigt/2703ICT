@extends('layouts/app')
@section('content')
	@restaurant
		<section class="own-restaurant">
			@include('components.restaurantpreview', ['restaurant' => grubly\Restaurant::find(\Auth::user()->id)])
		</section>
	@endrestaurant

	{{-- {{ dump(grubly\Product::mostPopular()) }} --}}

	@can ('viewAny', grubly\Restaurant::class)
		<h2>Restaurants Pending Verification</h2>
		<section class="pending-restaurants">
			@foreach (grubly\Restaurant::allUnverified() as $restaurant)
				@include('components.restaurantpreview', ['restaurant' => $restaurant])
			@endforeach
		</section>
		<h2>Verified Restaurants</h2>
	@endcan
	<section class="restaurant-list">
		@foreach (grubly\Restaurant::allVerified() as $restaurant)
			@include('components.restaurantpreview', ['restaurant' => $restaurant])
		@endforeach
	</section>
@endsection