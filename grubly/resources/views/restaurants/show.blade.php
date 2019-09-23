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
			<style>
				.product:before {
					content: "Add to order";
					display: flex;
					background: #0005;
					box-sizing: border-box;
					border: 2px solid #8BC34A;
					z-index: 50;
					justify-content: center;
					text-align: center;
					flex-direction: column;
					font-size: 40px;
					color: #fff;
					position: absolute;
					width: 100%;
					height: 100%;
					cursor: pointer;
					opacity: 0;
					transition: opacity 200ms ease;
				}
				.product:hover:before {
					opacity: 1;
				}
			</style>
			<script>
				document.addEventListener('DOMContentLoaded', ()=>{
					const products = document.querySelectorAll('.product');
					for (const product of products) {
						product.addEventListener('click', ()=>{
							addProductToCart(product.dataset.id);
						});
					}
				});
			</script>
		@endcan
	</div>
@endsection