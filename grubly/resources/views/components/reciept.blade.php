<div class="reciept">
	@php
		$date = new DateTime($purchase->created_at);
		$date->setTimezone(new DateTimeZone('Australia/Brisbane'));
	@endphp
	<div class="reciept-title">
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