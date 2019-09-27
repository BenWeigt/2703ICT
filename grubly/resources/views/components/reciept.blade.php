{{-- components.reciept --}}
{{-- This view is never used directly, rather included as part of another --}}

{{-- Reciept (of a purchase) display --}}
<div class="reciept">
	<div class="reciept-title">
		@php
			$date = new DateTime($purchase->created_at);
			$date->setTimezone(new DateTimeZone('Australia/Brisbane'));
		@endphp
		Ordered at {{$date->format('g:ia, d M, Y')}}
	</div>
	<div class="reciept-details">
		{{$purchase->user->name}}<br>
		{{$purchase->user->email}}<br>
		<div class="reciept-address">
			{{$purchase->address['address']}}<br>
			{{$purchase->address['suburb']}}, {{$purchase->address['postcode']}}, {{$purchase->address['state']}}
		</div>
	</div>

	{{--
		All products in purchase.
		These products are recorded staticaly as JSON within a purchase to ensure their immutability.
	--}}
	@foreach ($purchase->products as $product)
		<div class="cart-product">
			@if($product['image'])
				<img class="product-image" src="{{$product['image']}}">
			@endif
			<div class="product-name">
				{{$product['name']}}
			</div>
			<div class="product-price">
				{{$product['inCart']}}
				<div style="margin-left: auto; padding-top: 17px;">
					${{number_format($product['price'] * $product['inCart'], 2)}}
				</div>
			</div>
		</div>
	@endforeach
	<div class="reciept-total">
		${{number_format($purchase->total, 2)}}
	</div>
</div>