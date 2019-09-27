@extends('layouts/app')

{{-- restaurant.show --}}
@section('content')

	{{-- Restaurant display --}}
	<div class="restaurant">
		<div class="restaurant-info">
			<div style="font-size: 50px; color: #8BC34A; padding: 20px 0 0 60px;">
				{{$restaurant->name}}
			</div>
			<div style="font-size: small; color: #8BC34A; padding: 0 0 0 62px;">
				{{$restaurant->address}} <br>
				{{$restaurant->suburb}} {{$restaurant->postcode}} {{$restaurant->state}}
			</div>
		</div>

		{{-- User that is also this restaurant and can add products sees create method --}}
		@can('create', grubly\Product::class)
			@if(\Auth::user()->id === $restaurant->id)
				<a href="#" id="create-product" onclick="document.getElementById('product-create').style.display=''; event.preventDefault();">
					Create New
				</a>
			@endif
		@endcan

		{{-- Restaurant product list, paginated --}}
		<section class="restaurant-products">
			@can('create', grubly\Product::class)
				@if(\Auth::user()->id === $restaurant->id)
					@include('products.create')
				@endif
			@endcan
			@foreach(($paginations = $restaurant->products()->paginate(5)) as $product)
				@include('products.show', ['product' => $product])
			@endforeach
		</section>
		{{$paginations}}
	</div>
@endsection