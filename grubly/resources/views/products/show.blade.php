<div class="product" data-id="{{$product->id}}">
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