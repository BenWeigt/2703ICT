@extends('layouts/app')

@section('content')
	{{-- Restaurant display --}}
	<div class="restaurant">
		<div class="restaurant-info">
			<div class="restaurant-name">
				{{$restaurant->name}}
			</div>
			<div class="restaurant-address">
				<span>{{$restaurant->address}}</span>
				<span>{{$restaurant->suburb}}<span>
				<span>{{$restaurant->postcode}}<span>
				<span>{{$restaurant->state}}<span>
			</div>
		</div>
		{{-- Restaurant product list --}}
		<div class="restaurant-products">
			@foreach ($restaurant->products as $product)
				<div class="product">
					@if($product->image)
						<img class="product-image" src="{{$product->image}}">
					@endif
					<div class="product-name">
						{{$product->name}}
					</div>
					<div class="product-price">
						{{$product->price}}
					</div>
				</div>
			@endforeach
		<div>
	</div>
@endsection