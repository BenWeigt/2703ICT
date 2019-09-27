@extends('layouts/app')

{{-- restaurants.index will be displayed on landing --}}
@section('content')

	{{-- Restaurant see their own restaurant, regardless of verification --}}
	@restaurant
		<section class="own-restaurant">
			@include('components.restaurantpreview', ['restaurant' => grubly\Restaurant::find(\Auth::user()->id)])
		</section>
	@endrestaurant

	{{-- Administrator see all unverified restaurants --}}
	@can('viewAny', grubly\Restaurant::class)
		<h2>Restaurants Pending Verification</h2>
		<section class="pending-restaurants">
			@foreach (grubly\Restaurant::allUnverified() as $restaurant)
				@include('components.restaurantpreview', ['restaurant' => $restaurant])
			@endforeach
		</section>
	@endcan

	{{-- Everyone sees the 5 most popular dishes in the last 30 days --}}
	<div style="font-size: 50px; color: #8BC34A; padding: 20px 0 0 60px;">
		Popular at the moment
	</div>
	<div class="restaurant-products" style="padding: 10px 55px 30px 55px;">
		@foreach (grubly\Product::mostPopular() as $product)
			<div class="product linked-to-restaurant"
			     id="product-{{$product->id}}" 
			     onclick="window.location.href = '{{url(route('restaurants.show', $product->restaurant))}}';"
			     data-hover="Go to {{$product->restaurant->name}}"
			     style="margin: 0 5px; height: 170px; width: calc(20% - 10px);">
				<div class="product-name" style="font-size: 17px;">
					{{$product->name}}<br>
					<span class="product-price" style="font-size: 14px;">
						${{number_format($product->price, 2)}}
					</span>
				</div>
				<div class="product-img" @if ($product->image)style="background-image: url('{{$product->image}}');"@endif>
				</div>
			</div>
		@endforeach
	</div>

	{{-- Everyone sees all verified restaurants --}}
	<div style="font-size: 50px; color: #8BC34A; padding: 20px 0 0 60px;">Restaurants</div>
	<section class="restaurant-list">
		@foreach (grubly\Restaurant::allVerified() as $restaurant)
			@include('components.restaurantpreview', ['restaurant' => $restaurant])
		@endforeach
	</section>
@endsection