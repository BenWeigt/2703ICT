@extends('layouts/app')

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
		{{-- Restaurant product list --}}
		<section class="restaurant-products">
			@foreach(($paginations = $restaurant->products()->paginate(5)) as $product)
				@include('products.show', ['product' => $product])
			@endforeach
		</section>
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