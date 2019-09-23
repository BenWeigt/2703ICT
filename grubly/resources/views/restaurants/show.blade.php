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
			@foreach($restaurant->products as $product)
				@include('products.show', ['product' => $product])
			@endforeach
			
		</div>
		@can('purchaseFrom', $restaurant)
			<script>
				document.addEventListener('DOMContentLoaded', ()=>{
					console.log('setup');
					const products = document.querySelectorAll('.product');
					for (const product of products) {
						product.addEventListener('click', ()=>{
							console.log('click');
							const data = new FormData();
							data.append('product_id', product.dataset.id);
							fetch('{{route('addToCart')}}', {
								method: 'POST',
								headers: {
									'X-CSRF-TOKEN': '{{csrf_token()}}'
								},
								body: data
							});
						});
					}
				});
			</script>
		@endcan
	</div>
@endsection