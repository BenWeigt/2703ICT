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
			@foreach(($paginations = $restaurant->products()->paginate(4)) as $product)
				@include('products.show', ['product' => $product])
			@endforeach
		</div>
		<div class="restaurant-products-pagination">
			{{$paginations}}
		</div>
		
		@can('purchaseFrom', $restaurant)
			<script>
				document.addEventListener('DOMContentLoaded', ()=>{
					const products = document.querySelectorAll('.product');
					for (const product of products) {
						product.addEventListener('click', ()=>{
							const data = new FormData();
							data.append('product_id', product.dataset.id);
							fetch('{{route('addToCart')}}', {
								method: 'POST',
								headers: {
									'X-CSRF-TOKEN': '{{csrf_token()}}'
								},
								body: data
							}).then(response=>{
								response.text().then(text=>{
									const cart = document.getElementById('nav-cart');
									if (cart)
									{
										while (cart.nextSibling)
										{
											cart.parentNode.removeChild(cart.nextSibling);
										}
										cart.parentNode.removeChild(cart);
									}
									document.querySelector('nav').innerHTML += text;
									const script = text.match(/<script>([\s\S]*)<\/script>/);
									if (script)
										window.eval(script[1]);
								});
							});
						});
					}
				});
			</script>
		@endcan
	</div>
@endsection